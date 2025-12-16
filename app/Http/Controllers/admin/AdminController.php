<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{

    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }
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
        // Website
        $categoryCount    = Category::count();
        $subCategoryCount = SubCategory::count();
        $productCount     = Product::count();
        $userCount        = User::count();
        $slider           = Slider::count();

        // Orders
        $totalOrders      = Order::count();
        $pendingOrders    = Order::where('status', 'pending')->count();
        $approvedOrders   = Order::where('status', 'approved')->count();
        $dispatchedOrders = Order::where('status', 'dispatched')->count();
        $deliveredOrders  = Order::where('status', 'delivered')->count();

        // Revenue
        $todayRevenue = Order::whereDate('created_at', Carbon::today())
            ->where('status', 'delivered')
            ->sum('total');

        $totalRevenue = Order::where('status', 'delivered')->sum('total');

        return view('admin.index', compact(
            'categoryCount', 'subCategoryCount', 'productCount', 'slider', 'userCount',
            'totalOrders', 'pendingOrders', 'approvedOrders', 'dispatchedOrders', 'deliveredOrders',
            'todayRevenue', 'totalRevenue'
        ));
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

    public function allUsers()
    {
        $users = User::all();
        return view('admin.allUsers', compact('users'));
    }

    public function login(Request $request)
    {

        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
            // 'role' => 'required|string',

        ]);
        $role = $request->input('role');
        if ($role !== 'admin') {
            return response()->json([
                'status'  => false,
                'message' => 'Access denied. Admins only.',
            ], 403);
        }
        // Too many attempts?
        if (RateLimiter::tooManyAttempts($this->throttleKey($request), 30)) {
            return response()->json([
                'errors' => [
                    'login' => ['Too many login attempts. Please try again later.'],
                ],
            ], 429);
        }
        $credentials = $request->only('email', 'password', 'role');
        // $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        // if (Auth::attempt($credentials)) {
        if (Auth::guard('admin')->attempt([
            'email'    => $request->email,
            'password' => $request->password,
            'role'     => $request->role,
        ])
        ) {
            RateLimiter::clear($this->throttleKey($request)); // reset attempts

            return response()->json([
                'status'   => true,
                'role'     => $request->role,
                'message'  => 'Login successful',
                'redirect' => '/admin/dashboard',
            ]);
        }

                                                             // Record failed attempt
        RateLimiter::hit($this->throttleKey($request), 300); // lock for 5 mins

        return response()->json([
            'status'  => false,
            'message' => 'Invalid credentials',
        ], 401);
    }
    public function logout()
    {
        Log::info('Logging out admin: ' . Auth::guard('admin')->user()->email);

        Auth::guard('admin')->logout();

        // DO NOT invalidate entire session
        session()->regenerateToken();

        return redirect('/admin/')
            ->with('logout_success', 'You have been logged out successfully!');
    }

    public function store(Request $request)
    {

        try {
            $request->validate([
                'first_name'    => 'required|string|max:255',
                'last_name'     => 'required|string|max:255',
                'email'         => 'required|email|unique:users,email',
                'mobile'        => 'required|numeric|digits_between:8,20',
                'password'      => 'required|string|min:6|confirmed',
                'profile_image' => 'nullable|image|max:2048',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

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

        return response()->json(['message' => 'User created successfully.']);

    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        try {
            $request->validate([
                'first_name'    => 'required|string|max:255',
                'last_name'     => 'required|string|max:255',
                'email'         => 'required|email|unique:users,email,' . $user->id,
                'mobile'        => 'required|string|max:20',
                // 'password'   => 'nullable|string|min:6|confirmed',
                'profile_image' => 'nullable|image|max:2048',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }
            $user->profile_image = $request->file('profile_image')->store('profiles', 'public');
        }

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->name       = $request->first_name . ' ' . $request->last_name;
        $user->email      = $request->email;
        $user->mobile     = $request->mobile;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json(['message' => 'User updated successfully.']);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->profile_image) {
            Storage::disk('public')->delete($user->profile_image);
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
