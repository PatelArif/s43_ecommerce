<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Slider;
class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('id')->get();
        $categories = Category::with("subcategories")->get();
        $products = Product::where(function ($q) {
            $q->whereNull("discount")->orWhere("discount", 0);
        })
            ->inRandomOrder()
            ->take(8)
            ->get();
       $latestProducts = Product::latest() 
       ->inRandomOrder()
    ->take(5)
    ->get();
        $discountProducts = Product::whereNotNull("discount")
            ->where("discount", ">", 0)
            ->take(8)
            ->inRandomOrder()
            ->get();
        return view(
            "index",
            compact(
                "categories",
                "products",
                "latestProducts",
                "discountProducts",
                "sliders"
            )
        );
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
