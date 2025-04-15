<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin/login');
    }



}
