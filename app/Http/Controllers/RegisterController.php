<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use NoCaptcha;
class RegisterController extends Controller
{
    public function handleForm(Request $request)
    {
        // Validate form inputs and CAPTCHA
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'g-recaptcha-response' => 'required|captcha',  // reCAPTCHA validation
        ]);

        // Process form data (e.g., save to database)
        // Your logic goes here...

        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}

