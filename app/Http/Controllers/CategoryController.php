<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // ✅ This line is required
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{
  public function detail($slug)
{
    return view('productCategory', compact('slug',));
}
 public function categories()
    {
     
         $categories = Category::all();
        return view('admin.allCategories', compact('categories'));
    }
    // Store a new category
    public function categoriesStore(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name' => $request->name,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('subCategories', 'public');
        }

        Category::create($data);

        return redirect()->route('subCategories.index')->with('success', 'Category added successfully.');
    }

    // Show edit form
    public function categoriesEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.subCategories.edit', compact('category'));
    }

    // Update a category
    public function categoriesUpdate(Request $request, $id)
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

        return redirect()->route('subCategories.index')->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function categoriesDestroy($id)
    {
        $category = Category::findOrFail($id);

        // Delete image from storage
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('subCategories.index')->with('success', 'Category deleted successfully.');
    }
    // Show Sub categories
    public function subCategories()
    {
     
         $categories = Category::all();
        return view('admin.subCategories', compact('categories'));
    }
    // Store a new category
    public function subCategoriesStore(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name' => $request->name,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('subCategories', 'public');
        }

        Category::create($data);

        return redirect()->route('subCategories.index')->with('success', 'Category added successfully.');
    }

    // Show edit form
    public function subCategoriesEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.subCategories.edit', compact('category'));
    }

    // Update a category
    public function subCategoriesUpdate(Request $request, $id)
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

        return redirect()->route('subCategories.index')->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function subCategoriesDestroy($id)
    {
        $category = Category::findOrFail($id);

        // Delete image from storage
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('subCategories.index')->with('success', 'Category deleted successfully.');
    }
}