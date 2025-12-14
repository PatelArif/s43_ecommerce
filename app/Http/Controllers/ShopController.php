<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Show Cart Page
     */
    public function cart()
    {
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to view your cart.');
        }

        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $cart     = [];
        $subtotal = 0;

        foreach ($cartItems as $item) {
            $price     = $item->product->price;
            $quantity  = $item->quantity;
            $lineTotal = $price * $quantity;

            $subtotal += $lineTotal;

            $cart[] = [
                'id'         => $item->id,
                'name'       => $item->product->title,
                'image'      => $item->product->main_image,
                'price'      => $price,
                'quantity'   => $quantity,
                'subtotal'   => $lineTotal,
                'product_id' => $item->product->id,
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
            'total' => $total,
        ]);
    }

    /**
     * Add to Cart
     */
    public function addToCart(Request $request, $id)
    {
        if (! Auth::check()) {
            return response()->json([
                'success'  => false,
                'redirect' => route('login'),
                'message'  => 'Please login to add items to your cart.',
            ], 401);
        }

        $product = Product::findOrFail($id);

        // Quantity coming from JS
        $qty = $request->quantity ?? 1;

        $cartItem = Cart::firstOrNew([
            'user_id'    => Auth::id(),
            'product_id' => $id,
        ]);

        // If exists: REPLACE quantity, NOT increment
        // If new: SET quantity
        $cartItem->quantity = $qty;

        $cartItem->save();

        $total_cartItem = Cart::where('user_id', Auth::id())->count();

        return response()->json([
            'success'        => true,
            'total_cartItem' => $total_cartItem,
            'message'        => "{$product->name} added to cart successfully.",
        ]);
    }

    /**
     * Update Cart Item Quantity
     */
    public function updateQuantity(Request $request, $id)
    {
        $cart = Cart::where('user_id', auth()->id())
            ->where('id', $id)
            ->first();

        if (! $cart) {
            return response()->json(['success' => false, 'message' => 'Cart item not found']);
        }

        // increment or decrement
        if ($request->action === "increment") {
            $cart->quantity += 1;
        } elseif ($request->action === "decrement") {
            if ($cart->quantity > 1) {
                $cart->quantity -= 1;
            }
        }

        $cart->save();

        // calculate updated subtotal + grand total
        $cartItems = Cart::where('user_id', auth()->id())->get();

        $grandTotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        return response()->json([
            'success'     => true,
            'quantity'    => $cart->quantity,
            'subtotal'    => number_format($cart->quantity * $cart->price, 2),
            'grand_total' => number_format($grandTotal, 2),
        ]);
    }

public function updateCart(Request $request, $productId)
{
    $cartItem = Cart::where('user_id', auth()->id())
        ->where('product_id', $productId)
        ->first();

    if (!$cartItem) {
        return response()->json([
            'success' => false,
            'message' => 'Cart item not found'
        ]);
    }

    if ($request->action === 'increment') {
        $cartItem->quantity += 1;
    }

    if ($request->action === 'decrement' && $cartItem->quantity > 1) {
        $cartItem->quantity -= 1;
    }

    $cartItem->save();

    // Recalculate totals
    $cartItems = Cart::with('product')
        ->where('user_id', auth()->id())
        ->get();

    $grandTotal = $cartItems->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });

    return response()->json([
        'success' => true,
        'quantity' => $cartItem->quantity,
        'subtotal' => number_format(
            $cartItem->product->price * $cartItem->quantity,
            2
        ),
        'grand_total' => number_format($grandTotal + session('donation', 0), 2),
    ]);
}
    /**
     * Remove Cart Item
     */
   public function remove($id)
{
    if (!Auth::check()) {
        return response()->json([
            'success' => false,
            'message' => 'Please login first.',
        ], 401);
    }

    $cartItem = Cart::where('user_id', Auth::id())
        ->where('product_id', $id)
        ->first();

    if (!$cartItem) {
        return response()->json([
            'success' => false,
            'message' => 'Item not found.'
        ]);
    }

    $cartItem->delete();

    $cartItems = Cart::where('user_id', Auth::id())->get();

  $grandTotal = $cartItems->sum(function ($item) {
    return $item->product->price * $item->quantity;
});


    $donation = session('donation', 0);
    $grandTotalWithDonation = $grandTotal + $donation;

    return response()->json([
        'success' => true,
        'message' => 'Item removed successfully.',
        'total_cartItem' => $cartItems->count(),
        'grand_total' => number_format($grandTotalWithDonation, 2),
        'donation' => number_format($donation, 2),
    ]);
}


    /**
     * Store Donation
     */
    public function storeDonation(Request $request)
    {
        $request->validate([
            'donation' => 'nullable|numeric|min:0',
        ]);

        // store in session temporarily
        session(['donation' => $request->donation ?? 0]);

        return response()->json([
            'status'   => 'success',
            'redirect' => route('checkout'),
        ]);
    }

    /**
     * Checkout
     */
    public function checkout()
    {
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
        $donation = session('donation', 0);
        $total    = $subtotal + $donation;

        return view('checkout', compact('cartItems', 'subtotal', 'donation', 'total'));
    }
}
