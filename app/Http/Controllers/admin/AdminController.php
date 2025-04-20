<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
      public function create()
    {
        return view('admin.create');
    }
          public function admin()
    {
        return view('admin.login');
    }
            public function dashboard()
    {
        return view('admin.index');
    }
              public function layoutStatic()
    {
        return view('admin.layout-static');
    }
     public function layoutSidenavLight()
    {
        return view('admin.layout-sidenav-light');
    }

    public function charts()
    {
        return view('admin.charts');
    }

    public function password()
    {
        return view('admin.password');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function tables()
    {
        return view('admin.tables');
    }
public function store(Request $request)
{
    try {
        // Manually validate using Validator
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        // If validation fails, return custom response
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Check for duplicate email manually
        if (AdminUser::where('email', $request->email)->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'This email already exists!',
            ], 409); // 409 Conflict
        }

        // Create user
        AdminUser::create([
            'email' => $request->email,
            'password' => $request->password, // assume hashed with mutator
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Admin user created successfully!',
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Something went wrong: ' . $e->getMessage(),
        ], 500);
    }
}



public function login(Request $request)
{
    try {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Find user by email
        $user = AdminUser::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in
            Auth::login($user);

            return response()->json([
                'status'  => true,
                'message' => 'Login successful!',
                'redirect' => route('admin.dashboard'), // Make sure this route exists
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Wrong credentials. Please check your email and password.',
            ], 401); // Unauthorized
        }

    } catch (\Exception $e) {
        return response()->json([
            'status'  => false,
            'message' => 'Something went wrong: ' . $e->getMessage(),
        ], 500);
    }
}
}