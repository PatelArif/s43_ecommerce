<?php
namespace App\Providers;

use App\Models\Cart;
use App\Models\Favorite;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $globalCart        = [];
            $globalFavorites   = [];
            $totalCartQuantity = 0;

            if (auth()->check()) {
                $cartItems = Cart::with('product')
                    ->where('user_id', auth()->id())
                    ->get();

                $globalCart = $cartItems->mapWithKeys(function ($item) {
                    $product = $item->product;

                    $price = ($product->discount > 0 && $product->after_discount_price)
                        ? $product->after_discount_price
                        : $product->price;

                    return [
                        $item->product_id => [
                            'name'     => $product->title,
                            'quantity' => $item->quantity,
                            'price'    => $price,
                            'image'    => $product->main_image
                                ? asset('storage/' . $product->main_image)
                                : asset(config('constants.ASSETS_PATH') .'img/product/9.png'),
                        ],
                    ];
                })->toArray();
                $totalCartQuantity = array_sum(array_column($globalCart, 'quantity'));

                $globalFavorites = Favorite::where('user_id', auth()->id())
                    ->pluck('product_id')
                    ->toArray();
            }
            $view->with(compact('globalCart', 'globalFavorites', 'totalCartQuantity'));
        });
    }
}
