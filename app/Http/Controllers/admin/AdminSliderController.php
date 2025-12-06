<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class AdminSliderController extends Controller
{
    public function index()
{
    $sliders = Slider::with('category')->orderBy('id')->get();
    $categories = Category::all();
    
    return view('admin.allSliders', compact('sliders', 'categories'));
}


public function store(Request $request)
{
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'sub_title'   => 'nullable|string|max:255',
        'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        'button_text' => 'nullable|string|max:100',
        'description' => 'nullable|string',
        'category_id' => 'nullable|exists:categories,id',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');

        // Create folder if not exists
        $destinationPath = public_path('storage/slider');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Generate unique filename with .webp extension
        $filename = time() . '_' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';

        // Open & compress to WebP (quality 70 for optimization)
        $img = Image::make($image->getRealPath())
            ->encode('webp', 60);

        // Optional: resize if width > 1200px
        if ($img->width() > 1200) {
            $img->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        // Save image
        $img->save($destinationPath . '/' . $filename);

        $validated['image'] = 'slider/' . $filename;
    }

    // ✅ Create instance then save
    $slider = new Slider();
    $slider->title       = $validated['title'];
    $slider->sub_title   = $validated['sub_title'] ?? null;
    $slider->button_text = $validated['button_text'] ?? null;
    $slider->description = $validated['description'] ?? null;
    $slider->category_id = $validated['category_id'] ?? null;
    $slider->image       = $validated['image'];
    $slider->save();

    return response()->json($slider);
}
public function show(Slider $slider)
{
    return response()->json($slider->load('category'));
}

public function update(Request $request, Slider $slider)
{
    // ✅ Validate the request
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'sub_title'   => 'nullable|string|max:255',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:9120',
        'button_text' => 'nullable|string|max:100',
        'description' => 'nullable|string',
        'category_id' => 'nullable|exists:categories,id',
        'sort_order'  => 'nullable|integer',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        if ($slider->image && file_exists(public_path('storage/' . $slider->image))) {
            unlink(public_path('storage/' . $slider->image));
        }

        $image = $request->file('image');
        $destinationPath = public_path('storage/slider');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $filename = time() . '_' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';

        $img = Image::make($image->getRealPath())->encode('webp', 60);

        if ($img->width() > 1200) {
            $img->resize(1200, null, fn($constraint) => $constraint->aspectRatio());
        }

        $img->save($destinationPath . '/' . $filename);

        $validated['image'] = 'slider/' . $filename; // ✅ save to validated array
    }

    // Manually update slider fields
    $slider->title       = $validated['title'];
    $slider->sub_title   = $validated['sub_title'] ?? null;
    $slider->button_text = $validated['button_text'] ?? null;
    $slider->description = $validated['description'] ?? null;
    $slider->category_id = $validated['category_id'] ?? null;
    if (isset($validated['image'])) {
        $slider->image = $validated['image'];
    }
    if (isset($validated['sort_order'])) {
        $slider->sort_order = $validated['sort_order'];
    }

    $slider->save();

    return response()->json($slider->load('category'));
}
public function destroy(Slider $slider)
{
    // Delete image from storage if exists
    if ($slider->image && file_exists(public_path('storage/' . $slider->image))) {
        unlink(public_path('storage/' . $slider->image));
    }

    // Delete slider record
    $slider->delete();

    // Return success response
    return response()->json([
        'message' => 'Slider deleted successfully.'
    ]);
}




}