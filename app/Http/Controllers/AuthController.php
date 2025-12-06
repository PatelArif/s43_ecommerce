<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }
    public function showLoginForm()
    {
        $categories = Category::with('subcategories')->get();
        return view('login', compact('categories'));

    }
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Send reset link email
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    // Show reset password form (from email link)
    public function showResetForm(Request $request, $token)
    {
        return view('auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    // Handle password reset
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Too many attempts?
        if (RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            return response()->json([
                'errors' => [
                    'login' => ['Too many login attempts. Please try again later.'],
                ],
            ], 429);
        }

        $credentials = $request->only('email', 'password');
        $remember    = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            RateLimiter::clear($this->throttleKey($request)); // reset attempts

            return response()->json([
                'status'   => true,
                'message'  => 'Login successful',
                'redirect' => '/',
            ]);
        }

                                                             // Record failed attempt
        RateLimiter::hit($this->throttleKey($request), 300); // lock for 5 mins

        return response()->json([
            'status'  => false,
            'message' => 'Invalid credentials',
        ], 401);
    }

    public function user_edit(Request $request)
    {
        $user = Auth::user();

        // Validate request
        $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email,' . $user->id,
            'number'        => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|max:2048', // max 2MB

        ]);

        // Check if user wants to change password
        if ($request->filled('new_password')) {
            if (! Hash::check($request->current_password, $user->password)) {
                return response()->json([
                    'errors' => [
                        'current_password' => ['Current password is incorrect.'],
                    ],
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
            'message' => 'Profile updated successfully.',
        ]);
    }

    public function myAccount()
    {
        $user = Auth::user();

        if (! $user) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        // Fetch categories
        $categories = Category::with('subcategories')->get();

        // Fetch orders for the logged-in user (no items needed)
        $orders = Order::query();

        if (! $user->is_admin) {
            $orders->where('user_id', $user->id);
        }

        $orders = $orders->orderBy('created_at', 'desc')->get();

        // Pass everything to the view
        return view('my-account', compact('categories', 'user', 'orders'));
    }

    public function updateAddress(Request $request)
    {
        $user = Auth::user();

        if (! $user) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        // Validate inputs
        $request->validate([
            'phone'        => 'nullable|string|max:20',
            'address_line' => 'nullable|string|max:255',
            'city'         => 'nullable|string|max:100',
            'state'        => 'nullable|string|max:100',
            'zip_code'     => 'nullable|string|max:20',
            'country'      => 'nullable|string|max:100',
        ]);

        // Update user address fields
        $user->update($request->only([
            'phone',
            'address_line',
            'city',
            'state',
            'zip_code',
            'country',
        ]));

        // Redirect back with success message
        return redirect()->back()->with('success', 'Address updated successfully.');
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
