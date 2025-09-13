<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;
use App\Models\Favorite;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $globalCart = [];
            $globalFavorites = [];

            if (auth()->check()) {
                // ✅ Always fetch from DB
                $cartItems = Cart::with('product')
                    ->where('user_id', auth()->id())
                    ->get();

                // Log raw cart data from DB
                Log::info('Cart items fetched from DB', [
                    'user_id' => auth()->id(),
                    'count'   => $cartItems->count(),
                    'items'   => $cartItems->toArray()
                ]);

                $globalCart = $cartItems
                    ->mapWithKeys(fn($item) => [
                        $item->product_id => [
                            'name'     => $item->product->title,
                            'quantity' => $item->quantity,
                            'price'    => $item->product->discount > 0
                                ? $item->product->after_discount_price
                                : $item->product->price,
                            'image'    => $item->product->main_image
                                ? asset('storage/' . $item->product->main_image)
                                : asset('assets/img/product/9.png'),
                        ]
                    ])
                    ->toArray();

                // Log after mapping
                Log::info('Cart mapped for views', [
                    'user_id' => auth()->id(),
                    'cart'    => $globalCart
                ]);

                $globalFavorites = Favorite::where('user_id', auth()->id())
                    ->pluck('product_id')
                    ->toArray();

                // Log favorites
                Log::info('Favorites fetched', [
                    'user_id'   => auth()->id(),
                    'favorites' => $globalFavorites
                ]);
            }

            // share variables with all views
            $view->with(compact('globalCart', 'globalFavorites'));
        });
    }
}
