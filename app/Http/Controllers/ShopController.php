<?php
namespace App\Http\Controllers;

class ShopController extends Controller
{
    public function cart()
    {
        return view('shop-cart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function order()
    {
        return view('order');
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
