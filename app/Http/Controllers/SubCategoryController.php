<?php
namespace App\Http\Controllers;

class SubCategoryController extends Controller
{
    public function productcategory($slug, $id)
    {
        return view('product-details', compact('slug', 'id'));
    }

}
