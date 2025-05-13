<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
class AuthController extends Controller
{
    public function showLoginForm()
    {
        $categories = Category::with('subcategories')->get();
        return view('login', compact('categories'));

    }

   public function login(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required|string',
    ]);

    // Log the input credentials for debugging
    // \Log::info('Login attempt with credentials:', $request->only('email', 'password'));

    // Prepare credentials
    $credentials = $request->only('email', 'password');

    // Check if "remember me" checkbox was checked
    $remember = $request->has('remember');

  if (Auth::attempt($credentials, $remember)) {
    // \Log::info('Login successful for user: ' . Auth::user()->email);
    return response()->json([
        'message'  => 'Login successful',
        'redirect' => '/my-account',
    ]);
} else {
    // \Log::info('Login failed for user with email: ' . $request->email);
    return response()->json([
        'errors' => [
            'login' => ['Invalid credentials'],
        ],
    ], 401);
}

}

public function user_edit(Request $request)
{
    $user = Auth::user();

    // Validate request
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'email'      => 'required|email|unique:users,email,' . $user->id,
        'number'     => 'nullable|string|max:20',
       'profile_image' => 'nullable|image|max:2048', // max 2MB

    ]);


    // Check if user wants to change password
    if ($request->filled('new_password')) {
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'errors' => [
                    'current_password' => ['Current password is incorrect.'],
                ]
            ], 422);
        }
        $user->password = Hash::make($request->new_password);
    }
if ($request->hasFile('profile_image')) {
    $image = $request->file('profile_image');

    // Ensure directory exists
    $folderPath = public_path('uploads/profile_images');
    if (! file_exists($folderPath)) {
        mkdir($folderPath, 0755, true);
    }

    // Resize image if >1MB (optional)
    $imageName = strtolower($request->first_name . '_' . $request->last_name) . '.' . $image->getClientOriginalExtension();
    $imagePath = 'uploads/profile_images/' . $imageName;

    // Move file
    $image->move(public_path('uploads/profile_images'), $imageName);

    // Save path in DB
    $user->profile_image = $imagePath;
}

    // Update user info
    $user->first_name = $request->first_name;
    $user->last_name  = $request->last_name;
    $user->email      = $request->email;
    $user->mobile     = $request->number;
    $user->save();

    return response()->json([
        'message' => 'Profile updated successfully.'
    ]);
}

  public function myAccount()
{
    $user = Auth::user();
    if (!$user) {
        return redirect('/login');
    }
    $categories = Category::with('subcategories')->get();
    return view('my-account', compact('categories','user'));

}
public function logout()
{
    // \Log::info('Logging out user: ' . Auth::user()->email);

    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();

    return redirect('/login')->with('logout_success', 'You have been logged out successfully!');
}





    public function signUp()
    {
        return view('sign-up'); // You should have a sign-up view
    }

    public function forgotPassword()
    {
        return view('forgot-password'); // Optional view
    }
}
