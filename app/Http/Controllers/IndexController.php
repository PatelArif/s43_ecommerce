<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('index');
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
