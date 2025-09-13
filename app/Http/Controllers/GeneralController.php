<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
class GeneralController extends Controller
{
    public function about() {
        $categories = Category::with('subcategories')->get();
        return view('about', compact('categories'));

 
    }

    public function contact() {
        $categories = Category::with('subcategories')->get();
        return view('contact', compact('categories'));
    }

    public function faq() {
        return view('faq');
    }

    public function comingSoon() {
        return view('coming-soon');
    }

    public function categories() {
        return view('categories');
    }
     public function notFound()
    {
        return view('404');
    }

}
