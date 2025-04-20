<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function productDetails()
    {
        return view('product-details');
    }
        public function juteBags()
    {
        return view('juteBags');
    }
       public function totBags()
    {
        return view('totBags');
    }
      public function banjaraBags()
    {
        return view('banjaraBags');
    }
       public function canvasBags()
    {
        return view('canvasBags');
    }
}
