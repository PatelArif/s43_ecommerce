<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
class IndexController extends Controller
{
    public function index() {
        $categories = Category::with('subcategories')->get(); 
      return view('index', compact('categories'));
}
   

    public function index2() {
        return view('index-2');
    }

    public function index3() {
        return view('index-3');
    }

    public function index4() {
        return view('index-4');
    }
}
