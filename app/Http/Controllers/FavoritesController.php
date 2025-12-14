<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Cart;
use App\Models\Favorite;

class FavoritesController extends Controller
{
    /**
     * Display user favorites
     */
    public function viewFavorites()
    {
        if (auth()->check()) {
            // Fetch favorites from DB
            $favorites = Favorite::with('product')
                ->where('user_id', auth()->id())
                ->get()
                ->pluck('product'); // returns collection of products
        } else {
            // Fetch favorites from session
            $favoriteIds = session()->get('favorites', []);
            $favorites = Product::whereIn('id', array_keys($favoriteIds))->get();
        }

        return view('favorites', ['products' => $favorites]);
    }

    /**
     * Add/remove product from favorites
     */
    public function toggleFavorite($id)
    {
        if (auth()->check()) {
            $favorite = Favorite::where('user_id', auth()->id())
                ->where('product_id', $id)
                ->first();

            if ($favorite) {
                $favorite->delete();
                $added = false;
                $message = 'Removed from favorites';
            } else {
                Favorite::create([
                    'user_id' => auth()->id(),
                    'product_id' => $id,
                ]);
                $added = true;
                $message = 'Added to favorites';
            }

            $favoritesCount = Favorite::where('user_id', auth()->id())->count();
        } else {
            $favorites = session()->get('favorites', []);

            if (isset($favorites[$id])) {
                unset($favorites[$id]);
                $added = false;
                $message = 'Removed from favorites';
            } else {
                $product = Product::findOrFail($id);
                $favorites[$id] = $product->title;
                $added = true;
                $message = 'Added to favorites';
            }

            session()->put('favorites', $favorites);
            $favoritesCount = count($favorites);
        }

        return response()->json([
            'success' => true,
            'added' => $added,
            'message' => $message,
            'favorites_count' => $favoritesCount,
        ]);
    }

    /**
     * Move favorite product to cart
     */
    public function moveToCart($id)
    {
        $product = Product::findOrFail($id);

        // --- Add to Cart ---
        if (auth()->check()) {
            $cartItem = Cart::firstOrNew([
                'user_id' => auth()->id(),
                'product_id' => $id,
            ]);
            $cartItem->quantity = $cartItem->exists ? $cartItem->quantity + 1 : 1;
            $cartItem->save();

            // Build cart array for response
            $cart = Cart::with('product')
                ->where('user_id', auth()->id())
                ->get()
                ->mapWithKeys(fn($item) => [
                    $item->product_id => [
                        'name' => $item->product->title,
                        'quantity' => $item->quantity,
                        'price' => $item->product->discount > 0 
                            ? $item->product->after_discount_price 
                            : $item->product->price,
                        'image' => $item->product->main_image
                            ? asset(config('constants.IMAGE_PATH')  . $item->product->main_image)
                            : asset(config('constants.ASSETS_PATH') .'img/product/9.png'),
                    ]
                ])
                ->toArray();

            // Remove from favorites
            Favorite::where('user_id', auth()->id())
                ->where('product_id', $id)
                ->delete();

            $favoritesCount = Favorite::where('user_id', auth()->id())->count();
        } else {
            // Guest fallback - session
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "name" => $product->title,
                    "quantity" => 1,
                    "price" => $product->discount > 0 ? $product->after_discount_price : $product->price,
                    "image" => $product->main_image ? asset(config('constants.IMAGE_PATH')  . $product->main_image) : asset(config('constants.ASSETS_PATH') .'img/product/9.png')
                ];
            }
            session()->put('cart', $cart);

            // Remove from favorites
            $favorites = session()->get('favorites', []);
            if (isset($favorites[$id])) {
                unset($favorites[$id]);
                session()->put('favorites', $favorites);
            }

            $favoritesCount = count($favorites);
        }

        return response()->json([
            'success' => true,
            'message' => $product->title . ' moved to cart!',
            'cart' => $cart,
            'cart_count' => count($cart),
            'cart_total' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
            'favorites_count' => $favoritesCount,
        ]);
    }

    /**
     * Remove a favorite product
     */
    public function remove($id)
    {
        if (auth()->check()) {
            Favorite::where('user_id', auth()->id())
                ->where('product_id', $id)
                ->delete();

            $favoritesCount = Favorite::where('user_id', auth()->id())->count();
            $favorites = Favorite::with('product')->where('user_id', auth()->id())->get()->pluck('product');
        } else {
            $favorites = session()->get('favorites', []);
            if (isset($favorites[$id])) {
                unset($favorites[$id]);
                session()->put('favorites', $favorites);
            }
            $favoritesCount = count($favorites);
        }

        return response()->json([
            'success' => true,
            'favorites_count' => $favoritesCount,
            'favorites' => $favorites,
        ]);
    }
}
