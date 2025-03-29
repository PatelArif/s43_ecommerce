<?php
namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function signUp()
    {
        return view('sign-up');
    }

    public function forgotPassword()
    {
        return view('forgot-password');
    }

    public function myAccount()
    {
        return view('my-account');
    }

    public function account()
    {
        return view('account');
    }
}
