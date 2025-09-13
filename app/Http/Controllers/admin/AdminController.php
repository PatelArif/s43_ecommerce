<?php
namespace App\Http\Controllers\admin;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

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
    $categoryCount = Category::count();
    $subCategoryCount = SubCategory::count();
    $productCount = Product::count();
    $userCount = User::count();

    return view('admin.index', compact('categoryCount', 'subCategoryCount', 'productCount', 'userCount'));
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

        if ($user) {
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
       'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $user->id,
            'mobile'     => 'required|string|max:20',
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