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
        $cart = session()->get('cart', []);

        // Update session cart
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

        // Sync with DB if logged in
        if (auth()->check()) {
            $cartItem = Cart::firstOrNew([
                'user_id' => auth()->id(),
                'product_id' => $id,
            ]);

            $cartItem->quantity = $cartItem->exists ? $cartItem->quantity + 1 : 1;
            $cartItem->save();
        }

        return response()->json([
            'success' => true,
            'message' => $product->title . ' added to cart!',
            'cart' => $cart,
            'cart_count' => count($cart),
            'cart_total' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity'])
        ]);
    }

    /**
     * Update cart quantity
     */
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            if($request->action === 'increment') {
                $cart[$id]['quantity']++;
                $message = 'Item quantity increased';
            } elseif($request->action === 'decrement') {
                $cart[$id]['quantity']--;
                $message = 'Item quantity decreased';
            } else {
                $cart[$id]['quantity'] = max(0, (int)$request->quantity);
                $message = 'Item quantity updated';
            }

            // Remove if quantity is 0
            if($cart[$id]['quantity'] <= 0){
                unset($cart[$id]);
                session()->put('cart', $cart);

                // Remove from DB if logged in
                if (auth()->check()) {
                    Cart::where('user_id', auth()->id())
                        ->where('product_id', $id)
                        ->delete();
                }

                return response()->json([
                    'status'=>'success',
                    'message'=>'Item removed',
                    'cartCount'=>count($cart),
                    'total'=>collect($cart)->sum(fn($item)=>$item['price']*$item['quantity'])
                ]);
            }
        }

        session()->put('cart', $cart);

        // Update DB if logged in
        if (auth()->check() && isset($cart[$id])) {
            Cart::where('user_id', auth()->id())
                ->where('product_id', $id)
                ->update(['quantity' => $cart[$id]['quantity']]);
        }

        return response()->json([
            'status'=>'success',
            'message'=>$message,
            'quantity'=>$cart[$id]['quantity'],
            'subtotal'=>$cart[$id]['price'] * $cart[$id]['quantity'],
            'total'=>collect($cart)->sum(fn($item)=>$item['price']*$item['quantity']),
            'cartCount'=>count($cart)
        ]);
    }

    /**
     * Remove an item from cart
     */
public function remove(Request $request, $id)
{
    $favorites = session()->get('favorites', []);

    if (isset($favorites[$id])) {
        unset($favorites[$id]);
        session()->put('favorites', $favorites);

        if (auth()->check()) {
            Favorite::where('user_id', auth()->id())
                ->where('product_id', $id)
                ->delete();
        }
    }

    $count = count($favorites);

    return response()->json([
        'success' => true,
        'count'   => $count,   // 👈 very important
    ]);
}


}
