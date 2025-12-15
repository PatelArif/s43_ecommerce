<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Slider;
class IndexController extends Controller
{
public function index(Request $request)
{
    $sliders = Slider::orderBy('id')->get();

    $categories = Category::withCount('subcategories')->paginate(6);

    if ($request->ajax()) {
        return view('includes.home-category-list', compact('categories'))->render();
    }

    $products = Product::where(function ($q) {
        $q->whereNull("discount")->orWhere("discount", 0);
    })->inRandomOrder()->take(8)->get();

    $latestProducts = Product::latest()->inRandomOrder()->take(5)->get();

    $discountProducts = Product::whereNotNull("discount")
        ->where("discount", ">", 0)
        ->inRandomOrder()
        ->take(8)
        ->get();

    return view('index', compact(
        'categories',
        'products',
        'latestProducts',
        'discountProducts',
        'sliders'
    ));
}


    public function index2()
    {
        return view("index-2");
    }

    public function index3()
    {
        return view("index-3");
    }

    public function index4()
    {
        return view("index-4");
    }
}
