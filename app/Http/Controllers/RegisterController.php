<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
{
    return view('sign-up');
}
public function user_register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'mobile'     => 'required|string|max:20|unique:users,mobile',
        'email'      => 'required|string|email|max:255|unique:users,email',
        'password'   => 'required|string|min:6|confirmed',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Handle profile image upload
 

$user = new User();

if ($request->hasFile('profile_image')) {
    $user->profile_image = $request->file('profile_image')->store('profiles', 'public');
}

$user->first_name = $request->first_name;
$user->last_name  = $request->last_name;
$user->name       = $request->first_name . ' ' . $request->last_name;
$user->email      = $request->email;
$user->mobile     = $request->mobile;
$user->password   = Hash::make($request->password);

$user->save();

    return response()->json([
        'message' => 'User registered successfully!',
        'user'    => $user->only(['id', 'first_name', 'last_name', 'name', 'email', 'mobile', 'profile_image']),
    ]);
}
}

