<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Show Cart Page
     */
    public function cart()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to view your cart.');
        }

        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $cart = [];
        $subtotal = 0;

        foreach ($cartItems as $item) {
            $price    = $item->product->price;
            $quantity = $item->quantity;
            $lineTotal = $price * $quantity;

            $subtotal += $lineTotal;

            $cart[] = [
                'id'       => $item->id,
                'name'     => $item->product->title,
                'image'    => $item->product->main_image,
                'price'    => $price,
                'quantity' => $quantity,
                'subtotal' => $lineTotal,
                'product_id'=> $item->product->id
            ];
        }

        $donation   = session('donation', 0);
        $grandTotal = $subtotal + $donation;

        return view('shop-cart', compact('cart', 'subtotal', 'donation', 'grandTotal'));
    }
public function getCartSummary()
{
    $cartItems = Cart::with('product')
        ->where('user_id', Auth::id())
        ->get();

    $count = $cartItems->sum('quantity');
    $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

    return response()->json([
        'count' => $count,
        'total' => $total
    ]);
}

    /**
     * Add to Cart
     */
    public function addToCart($id)
    {
        if (!Auth::check()) {
            return response()->json([
                'success'  => false,
                'redirect' => route('login'),
                'message'  => 'Please login to add items to your cart.'
            ], 401);
        }

        $product = Product::findOrFail($id);

        $cartItem = Cart::firstOrNew([
            'user_id'    => Auth::id(),
            'product_id' => $id,
        ]);
        $cartItem->quantity = $cartItem->exists ? $cartItem->quantity + 1 : 1;
        $cartItem->save();
        $total_cartItem = $cartItem->count();

        return response()->json([
            'success' => true,
            'total_cartItem'=> $total_cartItem,
            'message' => "{$product->name} added to cart successfully."
        ]);
    }

    /**
     * Update Cart Item Quantity
     */
    public function updateCart(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        if (!Auth::check()) {
            return response()->json([
                'success'  => false,
                'redirect' => route('login'),
                'message'  => 'Please login to update your cart.'
            ], 401);
        }

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Item not found in cart.'], 404);
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json(['success' => true, 'message' => 'Cart updated successfully.']);
    }

    /**
     * Remove Cart Item
     */
    public function remove($id)
    { 
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

       $cartItem = Cart::where('user_id', Auth::id())
                ->where('product_id', $id)
                ->first();

if (!$cartItem) {
    return response()->json(['success' => false, 'message' => 'Item not found.']);
}

$cartItem->delete();
$cartCount = Cart::where('user_id', Auth::id())->count();
return response()->json([
    'success' => true,
    'message' => 'Item removed successfully.',
    'total_cartItem' => $cartCount
]);
    }

    /**
     * Store Donation
     */
    public function storeDonation(Request $request)
{
    $request->validate([
        'donation' => 'nullable|numeric|min:0'
    ]);

    // store in session temporarily
    session(['donation' => $request->donation ?? 0]);

    return response()->json([
        'status' => 'success',
        'redirect' => route('checkout')
    ]);
}


    /**
     * Checkout
     */
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
        $donation = session('donation', 0);
        $total    = $subtotal + $donation;

        return view('checkout', compact('cartItems', 'subtotal', 'donation', 'total'));
    }
}
