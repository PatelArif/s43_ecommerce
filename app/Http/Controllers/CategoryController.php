<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request; // ✅ This line is required
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
public function detail($id)
{
    $category = Category::findOrFail($id);

    // Get subcategories directly, always as a paginator
    $subcategories = \App\Models\Subcategory::where('category_id', $category->id)
                        ->withCount('products')
                        ->paginate(); // 8 per page

    // For menu/sidebar
    $categories = Category::with('subcategories')->get();

    return view('productCategory', compact('categories', 'category', 'subcategories'));
}




    public function index()
    {

         $categories = Category::all();
        return view('admin.allCategories', compact('categories'));
    }
     public function show()
    {

        $categories = Category::withCount('subcategories')->get();
        return view('categories', compact('categories'));
    }
    // Store a new category


public function store(Request $request)
{
    $request->validate([
        'name'  => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $category = new Category();
    $category->name = $request->name;

    if ($request->hasFile('image')) {
        // Store the image using Laravel's Storage facade
        $category->image = $request->file('image')->store('categories', 'public');
    }

    $category->save();

    return redirect()->route('categories.index')->with('success', 'Category added successfully.');
}

    // Show edit form
    public function categoriesEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Update a category
    public function Update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category       = Category::findOrFail($id);
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            // Store new image
            $category->image = $request->file('image')->store('categories', 'public');
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Delete image from storage
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
   // Show Subcategories

public function subCategories(Request $request)
{
    $query = Subcategory::with('category');

    if ($request->has('category_id') && $request->category_id != '') {
        $query->where('category_id', $request->category_id);
    }

    $subCategories = $query->get(); // 10 items per page
    $categories = Category::all(); // for filter dropdown

    return view('admin.subCategories', compact('subCategories', 'categories'));
}

// Store a new Subcategory
public function subCategoriesStore(Request $request)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name'        => 'required|string|max:255',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = [
        'category_id' => $request->category_id,
        'name'        => $request->name,
    ];

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('subcategories', 'public');
    }

    Subcategory::create($data);

    return redirect()->route('subCategories.index')->with('success', 'Subcategory added successfully.');
}

// Show edit form
public function subCategoriesEdit($id)
{
    $subcategory = Subcategory::findOrFail($id);
    return view('admin.subCategories.edit', compact('subcategory'));
}

// Update a subcategory
public function subCategoriesUpdate(Request $request, $id)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name'        => 'required|string|max:255',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $subcategory = Subcategory::findOrFail($id);
    $subcategory->category_id = $request->category_id;
    $subcategory->name        = $request->name;

    if ($request->hasFile('image')) {
        // Delete old image
        if ($subcategory->image && Storage::disk('public')->exists($subcategory->image)) {
            Storage::disk('public')->delete($subcategory->image);
        }

        // Store new image
        $subcategory->image = $request->file('image')->store('subcategories', 'public');
    }

    $subcategory->save();

    return redirect()->route('subCategories.index')->with('success', 'Subcategory updated successfully.');
}

// Delete a subcategory
public function subCategoriesDestroy($id)
{
    $subcategory = Subcategory::findOrFail($id);

    // Delete image from storage
    if ($subcategory->image && Storage::disk('public')->exists($subcategory->image)) {
        Storage::disk('public')->delete($subcategory->image);
    }

    $subcategory->delete();

    return redirect()->route('subCategories.index')->with('success', 'Subcategory deleted successfully.');
}
}
