<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

// Index Pages
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/index-2', [IndexController::class, 'index2'])->name('index2');
Route::get('/index-3', [IndexController::class, 'index3'])->name('index3');
Route::get('/index-4', [IndexController::class, 'index4'])->name('index4');

// Shop Pages
Route::get('/shop-cart', [ShopController::class, 'cart'])->name('shopCart');
Route::get('/checkout', [ShopController::class, 'checkout'])->name('checkout');
Route::get('/order', [ShopController::class, 'order'])->name('order');


// Category Routes
Route::get('/allCategories', [CategoryController::class, 'show'])->name('categories');
Route::get('/allCategories/{id}/', [CategoryController::class, 'detail'])->name('detail');
Route::get('/allCategories/{id}/{sub_id}', [ProductDetailController::class, 'allproducts'])->name('allproducts');


// Sub Category Routes
Route::get('/allCategories/{slug}/{id}', [SubCategoryController::class, 'productcategory'])->name('productcategory');

// Product routes
Route::get('/juteBags', [ProductDetailController::class, 'juteBags'])->name('jute');
Route::get('/canvasBags', [ProductDetailController::class, 'canvasBags'])->name('canvasBags');
Route::get('/banjaraBags', [ProductDetailController::class, 'banjaraBags'])->name('banjara');
Route::get('/totBags', [ProductDetailController::class, 'totBags'])->name('tot');
Route::get('/product-details', [ShopController::class, 'productDetails'])->name('productDetails');
// Route::get('/shop-left-sidebar', [ShopController::class, 'leftSidebar'])->name('shopLeftSidebar');
// Route::get('/shop-right-sidebar', [ShopController::class, 'rightSidebar'])->name('shopRightSidebar');


// General Pages
Route::get('/about', [GeneralController::class, 'about'])->name('about');
Route::get('/contact', [GeneralController::class, 'contact'])->name('contact');
Route::get('/faq', [GeneralController::class, 'faq'])->name('faq');
Route::get('/notFound', [GeneralController::class, 'notFound'])->name('notFound');

Route::get('/coming-soon', [GeneralController::class, 'comingSoon'])->name('comingSoon');

// Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// User edit
Route::post('/signup', [RegisterController::class, 'user_register'])->name('user_register');
Route::post('/user_edit', [AuthController::class, 'user_edit']);

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/my-account', [AuthController::class, 'myAccount'])->name('my-account');
});



// admin routes
Route::prefix('admin')->group(function () {
  Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
  Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/', [AdminController::class, 'admin']);

Route::post('/login', [AdminController::class, 'login']);
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/layout-sidenav-light', [AdminController::class, 'layoutSidenavLight']);
Route::get('/charts', [AdminController::class, 'charts']);
Route::get('/password', [AdminController::class, 'password']);
Route::get('/register', [AdminController::class, 'register']);
Route::get('/tables', [AdminController::class, 'tables']);

// ✅ subCategory management routes
Route::get('/allCategories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// ✅ subCategory management routes
Route::get('/subCategories', [CategoryController::class, 'subCategories'])->name('subCategories.index');
Route::post('/subCategories', [CategoryController::class, 'subCategoriesStore'])->name('subCategories.store');
Route::get('/subCategories/{id}/edit', [CategoryController::class, 'subCategoriesEdit'])->name('subCategories.edit');
Route::put('/subCategories/{id}', [CategoryController::class, 'subCategoriesUpdate'])->name('subCategories.update');
Route::delete('/subCategories/{id}', [CategoryController::class, 'subCategoriesDestroy'])->name('subCategories.destroy');

// ✅ Product management routes
Route::get('/products', [ProductDetailController::class, 'index'])->name('products.index');
Route::post('/products', [ProductDetailController::class, 'store'])->name('products.store');
// Route to fetch a product for editing
Route::get('/products/{id}', [ProductDetailController::class, 'show'])->name('products.show');


Route::get('/products/{id}/edit', [ProductDetailController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductDetailController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductDetailController::class, 'destroy'])->name('products.destroy');


Route::get('/allUsers', [AdminController::class, 'allUsers'])->name('admin.allUsers');
Route::post('/allUsers', [AdminController::class, 'store'])->name('store');
Route::put('/allUsers/{id}', [AdminController::class, 'update'])->name('update');
Route::delete('/allUsers/{id}', [AdminController::class, 'destroy'])->name('users.destroy');


});




