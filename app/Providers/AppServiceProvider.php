<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\View;

use App\Models\Cart;
use App\Models\Favorite;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
  

public function boot()
{
    View::composer('*', function ($view) {
        $globalCart = [];
        $globalFavorites = [];

        if (auth()->check()) {
            // Cart for logged-in users
            $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
            foreach ($cartItems as $item) {
                $globalCart[$item->product_id] = [
                    'name' => $item->product->title,
                    'quantity' => $item->quantity,
                    'price' => $item->product->discount > 0 
                        ? $item->product->after_discount_price 
                        : $item->product->price,
                    'image' => $item->product->main_image 
                        ? asset('storage/' . $item->product->main_image) 
                        : asset('assets/img/product/9.png')
                ];
            }

            // Favorites for logged-in users
            $favoritesItems = \App\Models\Favorite::with('product')
                ->where('user_id', auth()->id())->get();
            foreach ($favoritesItems as $fav) {
                $globalFavorites[$fav->product_id] = $fav->product->title;
            }
        } else {
            // Guests: session fallback
            $globalCart = session()->get('cart', []);
            $favorites = session()->get('favorites', []);
            $globalFavorites = $favorites ?: [];
        }

        $view->with(compact('globalCart', 'globalFavorites'));
    });
}
}
