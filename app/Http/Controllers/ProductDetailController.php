<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
class ProductDetailController extends Controller
{
    public function productDetails()
    {
        $categories = Category::with("subcategories")->get();
        return view("product-details", compact("categories"));
    }

public function allproducts(Request $request, $id, $sub_id)
{
    // Sidebar / menu
    $categories = Category::with('subcategories')->get();

    // Current subcategory
    $subcategory = Subcategory::findOrFail($sub_id);

    // ✅ PAGINATED PRODUCTS
    $products = Product::where('subcategory_id', $subcategory->id)
        ->paginate(1);

    // ✅ AJAX REQUEST → RETURN PARTIAL ONLY
    if ($request->ajax()) {
        return view('includes.product-list', compact('products', 'subcategory'))->render();
    }

    // Normal page load
    return view('allproducts', compact(
        'categories',
        'subcategory',
        'products'
    ));
}

    
    public function shopPage($id)
    {
        // Fetch a single product by ID
        $product = Product::findOrFail($id);

        return view("product-details", compact("product"));
    }

    public function totBags()
    {
        return view("totBags");
    }
    public function banjaraBags()
    {
        return view("banjaraBags");
    }
    public function canvasBags()
    {
        return view("canvasBags");
    }

    // admin products
    public function index(Request $request)
    {
        $query = Product::with("category", "subcategory")->orderBy('id', 'DESC');

        if ($request->filled("category_id")) {
            $query->where("category_id", $request->category_id);
        }

        if ($request->filled("subcategory_id")) {
            $query->where("subcategory_id", $request->subcategory_id);
        }

        $products = $query->get();
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view(
            "admin.allProducts",
            compact("products", "categories", "subcategories")
        );
    }
    public function show($id)
    {
        $product = Product::with("category")->findOrFail($id);

        return response()->json([
            "id" => $product->id,
            "title" => $product->title,
            "description" => $product->description,
            "price" => $product->price,
            "discount" => $product->discount,
            "after_discount_price" => $product->after_discount_price,
            "height" => $product->height,
            "width" => $product->width,
            "handle" => $product->handle,
            "base" => $product->base,
            "subcategory_id" => $product->subcategory_id,
            "feature_product" => $product->feature_product,
            "category_id" => $product->category_id,
            "main_image" => $product->main_image,
            "image_1" => $product->image_1,
            "image_2" => $product->image_2,
            "image_3" => $product->image_3,
            "image_4" => $product->image_4,
            "category_slug" => Str::slug($product->category->name),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "category_id" => "required|exists:categories,id",
            "subcategory_id" => "required|exists:subcategories,id",
            "title" => "required|string|max:255",
            "description" => "required|string",
            "main_image" => "required|image|max:5120",
            "image_1" => "nullable|image|max:5120",
            "image_2" => "nullable|image|max:5120",
            "image_3" => "nullable|image|max:5120",
            "image_4" => "nullable|image|max:5120",
            "price" => "required|numeric",
            "discount" => "nullable|numeric",
            "height" => "nullable|string",
            "width" => "nullable|string",
            "handle" => "nullable|string",
            "base" => "nullable|string",
        ]);

        $price = $request->input("price");
        $discount = $request->input("discount", 0);
        $afterDiscountPrice = $price - $price * ($discount / 100);

        $data = $request->only([
            "category_id",
            "subcategory_id",
            "title",
            "description",
            "price",
            "discount",
            "height",
            "width",
            "handle",
            "base",
            "after_discount_price",
        ]);
        $data["after_discount_price"] = $afterDiscountPrice;

        $categoryName = Str::slug(Category::find($request->category_id)->name);
        $productTitle = Str::slug($request->title);

        foreach (
            ["main_image", "image_1", "image_2", "image_3", "image_4"]
            as $index => $img
        ) {
            if ($request->hasFile($img)) {
                $suffix = $img === "main_image" ? "main" : $index;
                $file = $request->file($img);
                $filename = "{$productTitle}-{$suffix}.{$file->getClientOriginalExtension()}";

                // Full path to save image
                $folderPath = storage_path("app/public/{$categoryName}");
                $fullPath = "{$folderPath}/{$filename}";

                // ✅ Ensure directory exists
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0755, true);
                }

                $image = Image::make($file);

                if ($file->getSize() > 2 * 1024 * 1024) {
                    $image->resize(1200, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                }

                $image->save($fullPath); // Save to disk
                $data[$img] = "{$categoryName}/{$filename}"; // Save relative path to DB
            }
        }

        Product::create($data);

        return redirect()
            ->route("products.index")
            ->with("success", "Product added successfully.");
    }

    public function update(Request $request, $id)
    {
         $product = Product::findOrFail($id);

        $request->validate([
            "category_id" => "required|exists:categories,id",
            "subcategory_id" => "required|exists:subcategories,id",
            "title" => "required|string|max:255",
            "description" => "required|string",
            "main_image" => "nullable|image|max:5120",
            "image_1" => "nullable|image|max:5120",
            "image_2" => "nullable|image|max:5120",
            "image_3" => "nullable|image|max:5120",
            "image_4" => "nullable|image|max:5120",
            "price" => "required|numeric",
            "discount" => "nullable|numeric",
            "after_discount_price" => "nullable|numeric|min:0",
            "height" => "nullable|string",
            "width" => "nullable|string",
            "productHandle" => "nullable|boolean",
            "base" => "nullable|string",
             "featureProduct" => "nullable|boolean", 
        ]);
            $product->handle = $request->boolean("productHandle");
            $feature_product = $request->boolean("featureProduct");

        // Calculate after_discount_price dynamically based on price and discount
        $price = $request->input("price");
        $discount = $request->input("discount") ?? 0;
        $afterDiscountPrice = $price - $price * ($discount / 100);

        // Fill the product fields
        $product->fill(
            $request->only([
                "category_id",
                "subcategory_id",
                "title",
                "description",
                "price",
                "discount",
                "height",
                "width",
                "handle",
                "base",
                "after_discount_price",
                "feature_product",
            ])
        );

        // Set the calculated after_discount_price
        $product->after_discount_price = $afterDiscountPrice;

        // Get the category name for image paths
        $categoryName = Str::slug(Category::find($request->category_id)->name);
        $productTitle = Str::slug($request->title);

        // Handle image uploads and deletion of old images
        foreach (
            ["main_image", "image_1", "image_2", "image_3", "image_4"]
            as $index => $img
        ) {
            if ($request->hasFile($img)) {
                // Delete old image if exists
                if (
                    $product->$img &&
                    Storage::disk("public")->exists($product->$img)
                ) {
                    Storage::disk("public")->delete($product->$img);
                }

                $suffix = $img === "main_image" ? "main" : $index;
                $extension = $request->file($img)->getClientOriginalExtension();
                $filename = "{$productTitle}-{$suffix}.{$extension}";
                 $folder = storage_path("app/public/{$categoryName}");

                  if (!File::exists($folder)) {
                        File::makeDirectory($folder, 0755, true);
                    }
                 $path = "{$folder}/{$filename}";
                $image = Image::make($request->file($img)->getPathname()); // Use Intervention Image

                // Resize if image size is greater than 2MB
                if ($request->file($img)->getSize() > 2 * 1024 * 1024) {
                    $image->resize(1200, 1200, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                }

                $image->save($path); // Save image
                 $product->$img = "{$categoryName}/{$filename}"; // Update image path
            }
        }

        // Save the updated product
        $product->save();

        return redirect()
            ->route("products.index")
            ->with("success", "Product updated successfully.");
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view(
            "admin.products.edit",
            compact("product", "categories", "subcategories")
        );
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        foreach (
            ["main_image", "image_1", "image_2", "image_3", "image_4"]
            as $img
        ) {
            if (
                $product->$img &&
                Storage::disk("public")->exists($product->$img)
            ) {
                Storage::disk("public")->delete($product->$img);
            }
        }

        $product->delete();

        // Redirect to the products index route after successful deletion
        return redirect()
            ->route("products.index")
            ->with("success", "Product deleted successfully.");
    }
}
