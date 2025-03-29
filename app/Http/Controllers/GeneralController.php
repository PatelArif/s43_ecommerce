<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
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
