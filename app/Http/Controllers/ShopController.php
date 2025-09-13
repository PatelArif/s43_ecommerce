<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Cart;

class ShopController extends Controller
{
    /**
     * Display the cart page
     */
    public function cart()
    {
        $categories = Category::with('subcategories')->get();

        if (auth()->check()) {
            // Fetch cart from DB for logged-in users
            $cartItems = Cart::with('product')
                ->where('user_id', auth()->id())
                ->get();

            $cart = [];
            foreach ($cartItems as $item) {
                $cart[$item->product_id] = [
                    'name' => $item->product->title,
                    'quantity' => $item->quantity,
                    'price' => $item->product->discount > 0 
                        ? $item->product->after_discount_price 
                        : $item->product->price,
                    'image' => $item->product->main_image
                        ? asset('storage/' . $item->product->main_image)
                        : asset('assets/img/product/9.png'),
                ];
            }
        } else {
            // Guest fallback - session
            $cart = session('cart', []);
        }

        return view('shop-cart', compact('categories', 'cart'));
    }

    /**
     * Checkout page
     */
    public function checkout()
    {
        $categories = Category::with('subcategories')->get();
        return view('checkout', compact('categories'));
    }

    /**
     * Orders page
     */
    public function order()
    {
        $categories = Category::with('subcategories')->get();
        return view('order', compact('categories'));
    }

    /**
     * Add a product to cart
     */
public function addToCart(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Session cart for guests
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "name" => $product->title,
            "quantity" => 1,
            "price" => $product->discount > 0 ? $product->after_discount_price : $product->price,
            "image" => $product->main_image ? asset('storage/' . $product->main_image) : asset('assets/img/product/9.png')
        ];
    }

    session()->put('cart', $cart);

    // Logged-in users → update DB and return DB cart
    if (auth()->check()) {
        $cartItem = Cart::firstOrNew([
            'user_id' => auth()->id(),
            'product_id' => $id,
        ]);

        $cartItem->quantity = $cartItem->exists ? $cartItem->quantity + 1 : 1;
        $cartItem->save();

        // Fetch latest DB cart for the user
        $dbCartItems = Cart::with('product')->where('user_id', auth()->id())->get();

        $cart = $dbCartItems->mapWithKeys(function($item) {
            return [
                $item->product_id => [
                    'name'     => $item->product->title,
                    'quantity' => $item->quantity,
                    'price'    => $item->product->discount > 0 ? $item->product->after_discount_price : $item->product->price,
                    'image'    => $item->product->main_image ? asset('storage/' . $item->product->main_image) : asset('assets/img/product/9.png'),
                ]
            ];
        })->toArray();
    }

    return response()->json([
        'success' => true,
        'message' => $product->title . ' added to cart!',
        'cart' => $cart,
        'cart_count' => count($cart),
        'cart_total' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
    ]);
}


public function updateQuantity(Request $request, $id)
{
    $action = $request->input('action'); // 'increment' or 'decrement'

    if (!auth()->check()) {
        // guest user → update session
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            if ($action === 'increment') {
                $cart[$id]['quantity']++;
            } elseif ($action === 'decrement' && $cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            }
            session()->put('cart', $cart);
        }
    } else {
        // logged-in user → update DB
        $cartItem = Cart::firstOrNew([
            'user_id' => auth()->id(),
            'product_id' => $id,
        ]);

        if (!$cartItem->exists) {
            $cartItem->quantity = 1;
            $cartItem->save();
        } else {
            if ($action === 'increment') {
                $cartItem->quantity++;
            } elseif ($action === 'decrement' && $cartItem->quantity > 1) {
                $cartItem->quantity--;
            }
            $cartItem->save();
        }

        // fetch latest DB cart for response
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        $cart = $cartItems->mapWithKeys(fn($item) => [
            $item->product_id => [
                'name'     => $item->product->title,
                'quantity' => $item->quantity,
                'price'    => $item->product->discount > 0 ? $item->product->after_discount_price : $item->product->price,
                'image'    => $item->product->main_image ? asset('storage/' . $item->product->main_image) : asset('assets/img/product/9.png'),
            ]
        ])->toArray();
    }

    $cart_total = collect($cart ?? session()->get('cart', []))->sum(fn($item) => $item['price'] * $item['quantity']);

    return response()->json([
        'success' => true,
        'cart' => $cart ?? session()->get('cart', []),
        'cart_count' => count($cart ?? session()->get('cart', [])),
        'cart_total' => $cart_total,
    ]);
}
public function remove($id)
{
    if (!auth()->check()) {
        // Guest: remove from session
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
    } else {
        // Logged-in: remove from DB
        Cart::where('user_id', auth()->id())->where('product_id', $id)->delete();
    }

    // Get latest cart for response
    $cart = auth()->check() 
        ? Cart::with('product')->where('user_id', auth()->id())->get()
            ->mapWithKeys(fn($item) => [
                $item->product_id => [
                    'name'     => $item->product->title,
                    'quantity' => $item->quantity,
                    'price'    => $item->product->discount > 0 ? $item->product->after_discount_price : $item->product->price,
                    'image'    => $item->product->main_image ? asset('storage/' . $item->product->main_image) : asset('assets/img/product/9.png'),
                ]
            ])->toArray()
        : session()->get('cart', []);

    $cart_total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

    return response()->json([
        'success' => true,
        'cart' => $cart,
        'cart_count' => count($cart),
        'cart_total' => $cart_total,
    ]);
}



}
