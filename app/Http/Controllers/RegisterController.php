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
    // Step 1: Validate the data
   $validator = Validator::make($request->all(), [
    'first_name' => 'required|string|max:255',
    'last_name'  => 'required|string|max:255',
    'mobile'     => 'required|string|max:20|unique:users,mobile',
    'email'      => 'required|string|email|max:255|unique:users,email', // Corrected this line

    'password'   => 'required|string|min:6|confirmed',
]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Step 2: Create the user
    $user = User::create([
        'first_name' => $request->first_name,
        'last_name'  => $request->last_name,
        'name'       => $request->first_name . ' ' . $request->last_name, // ← ADD THIS
        'mobile'     => $request->mobile,
        'email'     => $request->email,
        'password'   => Hash::make($request->password),
    ]);

    return response()->json([
        'message' => 'User registered successfully!',
        'user' => $user->only(['id', 'first_name', 'last_name', 'name', 'mobile']), // only send required fields
    ]);
}


}

