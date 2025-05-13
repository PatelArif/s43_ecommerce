<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
class ShopController extends Controller
{
    public function cart()
    {
        $categories = Category::with('subcategories')->get();
        return view('shop-cart', compact('categories'));

 
    }

    public function checkout()
    {
        $categories = Category::with('subcategories')->get();
        return view('checkout', compact('categories'));

    }

    public function order()
    {
        $categories = Category::with('subcategories')->get();
        return view('order', compact('categories'));

    }
 
    // public function leftSidebar()
    // {
    //     return view('shop-left-sidebar');
    // }

    // public function rightSidebar()
    // {
    //     return view('shop-right-sidebar');
    // }
}
