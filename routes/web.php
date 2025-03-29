<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ShopController;
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

Route::get('/product-details', [ShopController::class, 'productDetails'])->name('productDetails');
Route::get('/shop-left-sidebar', [ShopController::class, 'leftSidebar'])->name('shopLeftSidebar');
Route::get('/shop-right-sidebar', [ShopController::class, 'rightSidebar'])->name('shopRightSidebar');

// General Pages
Route::get('/about', [GeneralController::class, 'about'])->name('about');
Route::get('/contact', [GeneralController::class, 'contact'])->name('contact');
Route::get('/faq', [GeneralController::class, 'faq'])->name('faq');
Route::get('/notFound', [GeneralController::class, 'notFound'])->name('notFound');

Route::get('/categories', [GeneralController::class, 'categories'])->name('categories');
Route::get('/coming-soon', [GeneralController::class, 'comingSoon'])->name('comingSoon');

// Authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/sign-up', [AuthController::class, 'signUp'])->name('signUp');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
Route::get('/my-account', [AuthController::class, 'myAccount'])->name('myAccount');

