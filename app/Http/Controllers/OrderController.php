<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function myOrders(Request $request)
    {
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first to view your orders.');
        }

        $user = auth()->user();

        if ($user->is_admin) {
            $orders = Order::with('items')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            $orders = Order::with('items')
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('order', compact('orders'));
    }

    public function myaccOrders(Request $request)
    {
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login first to view your orders.');
        }

        $user = auth()->user();

        if ($user->is_admin) {
            $orders = Order::with('items')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            $orders = Order::with('items')
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('my-account', compact('orders'));
    }

    // Show checkout page
    public function checkout()
    {
        $cartItems = Cart::with("product")
            ->where("user_id", Auth::id())
            ->get();

        $subtotal = $cartItems->sum(
            fn($item) => $item->product->price * $item->quantity
        );

        return view("checkout", compact("cartItems", "subtotal"));
    }

    public function downloadInvoice($id)
    {
        $order = Order::with([
            "user",
            "items.product",
            "donations",
        ])->findOrFail($id);

        // Ensure only owner or admin can access
        if ($order->user_id !== Auth::id() && ! auth()->user()->is_admin) {
            abort(403, "Unauthorized access");
        }

        // Generate PDF on the fly
        $pdf = Pdf::loadView("invoice", compact("order"));

        return $pdf->download("invoice_" . $order->id . ".pdf");
    }

    public function store(Request $request)
    {
        Log::info("Checkout started for user: " . Auth::id());

        $cartItems = Cart::with("product")
            ->where("user_id", Auth::id())
            ->get();
        if ($cartItems->isEmpty()) {
            Log::warning("Cart is empty for user: " . Auth::id());
            return back()->with("error", "Cart is empty.");
        }

        $subtotal = $cartItems->sum(
            fn($item) => $item->product->price * $item->quantity
        );
        $donation = $request->donation ?? 0;
        $total    = $subtotal + $donation;

        DB::beginTransaction();

        // try {
        // Handle slip upload
        $slipPath = $request->hasFile("payment_slip")
            ? $request->file("payment_slip")->store("payment_slips", "public")
            : null;
        $orderId         = 'ORD-' . strtoupper(Str::random(8)); // Example: ORD-1A2B3C4D
        $shippingAddress = trim(
            (auth()->user()->address_line ?? '') . ', ' .
            (auth()->user()->city ?? '') . ', ' .
            (auth()->user()->state ?? '') . ' - ' .
            (auth()->user()->zip_code ?? '') . ', ' .
            (auth()->user()->country ?? '')
        );
        // Save order
        $order = Order::create([
            'order_id'         => $orderId, // custom unique order id
            'user_id'          => Auth::id(),
            'shipping_address' => $shippingAddress,
            'subtotal'         => $subtotal,
            'total'            => $total,
            'payment_method'   => $request->payment_method,
            'payment_slip'     => $slipPath,
            'status'           => 'pending',
        ]);

        // Save donation if present
        if ($donation > 0) {
            \App\Models\Donation::create([
                "order_id" => $order->id,
                "user_id"  => Auth::id(),
                "amount"   => $donation,
            ]);
        }

        foreach ($cartItems as $item) {
            OrderItem::create([
                "order_id"     => $order->id,
                "product_id"   => $item->product_id,
                "product_name" => $item->product->title,
                "quantity"     => $item->quantity,
                "price"        => $item->product->price,
                "subtotal"     => $item->product->price * $item->quantity,
            ]);
        }

        $directory = storage_path("app/public/customer-invoices");
        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true); // recursive create
        }

        // Generate PDF
        $pdf = Pdf::loadView("invoice", compact("order"))->setPaper(
            "A4",
            "portrait"
        );

        $pdfPath = "customer-invoices/invoice_" . $order->order_id . ".pdf";

        // Save PDF to storage/app/public/customer-invoices
        Storage::disk("public")->put($pdfPath, $pdf->output());

        // Save path in DB
        $order->invoice_path = $pdfPath;
        $order->save();

        // ✅ Send email with PDF attached
        \Mail::send("emails.invoice_mail", compact("order"), function (
            $message
        ) use ($order, $pdfPath) {
            $message
                ->to($order->user->email)
                ->subject("Your Invoice from Step For Environment")
                ->attach(storage_path("app/public/" . $pdfPath));
        });
        // return "mail send";
        // Clear cart
        Cart::where("user_id", Auth::id())->delete();

        DB::commit();

        return redirect()
            ->route("myOrders")
            ->with("success", "Order placed successfully!");

        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     Log::error('Transaction failed', ['error' => $e->getMessage()]);
        //     return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        // }
    }

    public function invoice($orderId)
    {
        // $order = Order::with(['items', 'donation', 'user'])->findOrFail($orderId);
        $order = Order::with([
            "user",
            "donations",
            "items.product",
        ])->findOrFail($orderId);

        // Make sure user can only see their own order
        if ($order->user_id !== Auth::id()) {
            abort(403, "Unauthorized access");
        }
        return view("emails.invoice_mail", compact("order"));
    }

    // public function sendInvoiceImage(Request $request)
    // {
    //     $request->validate([
    //         'invoice_image' => 'required|image',
    //         'order_id'      => 'required|exists:orders,id',
    //     ]);

    //     $order = Order::findOrFail($request->order_id);

    //     // Store the image
    //     $path = $request->file('invoice_image')->store('invoices', 'public');

    //     // Save path in DB
    //     $order->invoice_path = $path;
    //     $order->save();

    //     // Log the email and attachment path
    //     Log::info('Sending invoice email', [
    //         'order_id' => $order->id,
    //         'to'       => $order->user->email,
    //         'attachment' => $path,
    //     ]);

    //     // Send email
    //   Mail::send('emails.invoice_mail', compact('order'), function($message) use ($order, $path) {
    //     $message->to($order->user->email)
    //             ->subject('Your Invoice from Step For Environment')
    //             ->attach(storage_path('app/public/' . $path));
    // });

    //     return response()->json(['success' => true]);
    // }

    // Show all orders
    public function index()
    {
        $orders = Order::with('user', 'items')->orderBy('id', 'desc')->get();
        return view('admin.allOrders', compact('orders'));
    }

    // Filter orders by status (pending / approved)
    public function filterByStatus($status)
    {
        $orders = Order::with('user', 'items')
            ->where('status', $status)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.allOrders', compact('orders', 'status'));
    }

    // Approve order
    public function approve(Order $order)
    {
        $order->status = 'approved';
        $order->save();

        return redirect()->back()->with('success', 'Order approved successfully!');
    }

    // Reject order
    public function reject(Order $order)
    {
        $order->status = 'Pending';
        $order->save();

        return redirect()->back()->with('success', 'Order rejected successfully!');
    }

}
