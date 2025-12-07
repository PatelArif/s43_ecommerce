<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminSliderController;

use App\Http\Controllers\admin\ContactController as AdminContactController;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Index Pages
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/index-2', [IndexController::class, 'index2'])->name('index2');
Route::get('/index-3', [IndexController::class, 'index3'])->name('index3');
Route::get('/index-4', [IndexController::class, 'index4'])->name('index4');

// Shop Pages
Route::get('/shop-cart', [ShopController::class, 'cart'])->name('shopCart');
// Route::get('/checkout', [ShopController::class, 'checkout'])->name('checkout');
Route::get('/order', [ShopController::class, 'order'])->name('order');


// Category Routes
Route::get('/allCategories', [CategoryController::class, 'show'])->name('categories');
Route::get('/allCategories/{id}/', [CategoryController::class, 'detail'])->name('detail');
Route::get('/allCategories/{id}/{sub_id}', [ProductDetailController::class, 'allproducts'])->name('allproducts');

Route::get('/generate-pdf', function () {
    $data = [
        'title' => 'Welcome to DOMPDF in Laravel 12',
        'date'  => date('m/d/Y'),
    ];

    $pdf = Pdf::loadView('emails.invoice_mail', $data);

    return $pdf->download('myfile.pdf');
});
// Sub Category Routes
Route::get('/allCategories/{slug}/{id}', [SubCategoryController::class, 'productcategory'])->name('productcategory');

// Product routes
Route::get('/juteBags', [ProductDetailController::class, 'juteBags'])->name('jute');
Route::get('/canvasBags', [ProductDetailController::class, 'canvasBags'])->name('canvasBags');
Route::get('/banjaraBags', [ProductDetailController::class, 'banjaraBags'])->name('banjara');
Route::get('/totBags', [ProductDetailController::class, 'totBags'])->name('tot');
Route::get('/product-details', [ProductDetailController::class, 'productDetails'])->name('productDetails');
// Route::get('/shop-left-sidebar', [ShopController::class, 'leftSidebar'])->name('shopLeftSidebar');
// Route::get('/shop-right-sidebar', [ShopController::class, 'rightSidebar'])->name('shopRightSidebar');
Route::get('/product-details/{id}', [ProductDetailController::class, 'shopPage']);

// add to cart route
Route::post('/favorites/toggle/{id}', [FavoritesController::class, 'toggleFavorite'])->name('favorites.toggle');
Route::get('/favorites', [FavoritesController::class, 'viewFavorites'])->name('favorites.view');
Route::delete('/favorites/remove/{id}', [FavoritesController::class,'remove'])->name('favorites.remove');
Route::post('/favorites/move-to-cart/{id}', [FavoritesController::class, 'moveToCart'])
    ->name('favorites.moveToCart');

Route::get('/order/{id}/invoice-pdf', [OrderController::class, 'downloadInvoice'])->name('order.invoicePdf');

Route::post('/cart/add/{id}', [ShopController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update/{id}', [ShopController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{id}', [ShopController::class, 'remove'])->name('cart.remove');

Route::get('/shop-cart', [ShopController::class, 'cart'])->name('cart');

// General Pages
Route::get('/about', [GeneralController::class, 'about'])->name('about');
Route::get('/contact', [GeneralController::class, 'contact'])->name('contact');
Route::get('/faq', [GeneralController::class, 'faq'])->name('faq');
Route::get('/notFound', [GeneralController::class, 'notFound'])->name('notFound');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/coming-soon', [GeneralController::class, 'comingSoon'])->name('comingSoon');
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/contacts', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
    Route::delete('/contacts/{id}', [App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contacts.destroy');
});

// Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])
    ->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])
    ->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->name('password.update');
// Register
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// User edit
Route::post('/signup', [RegisterController::class, 'user_register'])->name('user_register');
Route::post('/user_edit', [AuthController::class, 'user_edit']);

Route::post('/update-address', [AuthController::class, 'updateAddress'])->name('user.updateAddress');
// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/my-account', [AuthController::class, 'myAccount'])->name('my-account');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});
Route::post('/orders/send-invoice-image', [OrderController::class, 'sendInvoiceImage'])->name('orders.sendInvoiceImage');
Route::get('/test-mail', function(){
    Mail::raw('Test email', function($message){
        $message->to('patelarif9498@gmail.com')->subject('Test Mail');
    });
    return 'Mail sent to arif';
});
Route::get('/order/{order}/invoice', [OrderController::class, 'invoice'])->name('order.invoice');

Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('myOrders');

// routes/web.php
Route::post('/cart/donation', [ShopController::class, 'storeDonation'])->name('cart.donation');

Route::post('/orders/{id}/approve', [OrderController::class, 'approve'])->name('orders.approve');





Route::get('/admin/', [AdminController::class, 'admin']);
Route::post('/admin/login', [AdminController::class, 'login']);

Route::middleware(['auth_check'])->prefix('admin')->group(function () {
   Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
  Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
Route::post('/logout', [AdminController::class, 'logout'])->name('admin_logout');

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

   // Contact Submissions (Admin)
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::delete('/contacts/{id}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    Route::get('/sliders', [AdminSliderController::class, 'index'])->name('sliders.index');
    Route::get('/sliders/{slider}', [AdminSliderController::class, 'show'])->name('sliders.show');

    Route::post('/sliders', [AdminSliderController::class, 'store'])->name('sliders.store');
    Route::put('/sliders/{slider}', [AdminSliderController::class, 'update'])->name('sliders.update');
    Route::delete('/sliders/{slider}', [AdminSliderController::class, 'destroy'])->name('sliders.destroy');
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/status/{status}', [OrderController::class, 'filterByStatus'])->name('admin.orders.status');
    Route::post('/orders/{order}/approve', [OrderController::class, 'approve'])->name('admin.orders.approve');
    Route::post('/orders/{order}/reject', [OrderController::class, 'reject'])->name('admin.orders.reject');



});





