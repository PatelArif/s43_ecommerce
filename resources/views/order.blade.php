@extends("app")
@section('content')
    <style>
        /* Unique Eco-Friendly Order Styles */
        .eco-orders-section {
            background: #eaf6ea;
            padding: 60px 0;
            font-family: 'Poppins', sans-serif;
        }

        .eco-orders-section h2 {
            text-align: center;
            color: #2a6b2a;
            font-weight: 700;
            margin-bottom: 50px;
        }

        /* Order Card */
        .eco-order-card {
            position: relative;
            background: #fffef8;
            border-left: 6px solid #2a6b2a;
            border-radius: 16px;
            box-shadow: 0 5px 25px rgba(42, 107, 42, 0.15);
            margin-bottom: 30px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .eco-order-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 35px rgba(42, 107, 42, 0.25);
        }

        /* Status Ribbon */
        .eco-order-ribbon {
            width: 130px;
            height: 28px;
            color: #fff;
            text-align: center;
            line-height: 28px;
            font-weight: 600;
            font-size: 0.85rem;
            position: absolute;
            top: 15px;
            right: -30px;
            transform: rotate(45deg);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .eco-ribbon-pending {
            background: #ec8a00;
        }

        .eco-ribbon-approved {
            background: #00c006;
        }

        .eco-ribbon-rejected {
            background: #c0392b;
        }

        /* Order Header */
        .eco-order-header {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            align-items: center;
            background: linear-gradient(90deg, #2a6b2a, #386638);
            color: #ffffff;
            padding: 18px 25px;
            font-weight: 600;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }

        .eco-order-header h3 {
            margin: 0;
            font-size: 1.2rem;
            color: #fff
        }

        .eco-order-header span {
            font-size: 0.9rem;
        }

        /* Order Items */
        .eco-order-items {
            padding: 20px 25px;
            border-bottom: 1px solid #d0e6d0;
        }

        .eco-order-items h4 {
            font-size: 1.1rem;
            margin-bottom: 10px;
            font-weight: 600;
            color: #2a6b2a;
        }

        .eco-order-items ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .eco-order-items li {
            padding: 6px 0;
            border-bottom: 1px solid #f0f4f0;
            font-size: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            color: #000000;
        }

        .eco-order-items li::before {
            content: "🍃";
            /* leaf icon for eco-friendly feel */
            margin-right: 8px;
        }

        /* Order Meta */
        .eco-order-meta {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 15px 25px;
            background: #d6d8d6;
            gap: 10px;
            font-size: 0.95rem;
        }

        .eco-order-meta div {
            font-weight: 500;
            min-width: 120px;
            color: #2d2d2d;
        }

        /* Status Badge */
        .eco-status-badge {
            padding: 6px 14px;
            border-radius: 20px;
            color: #ffffff;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: capitalize;
        }

        .eco-status-pending {
            background: #ec8a00;
        }

        .eco-status-approved {
            background: #00c006;
        }

        .eco-status-rejected {
            background: #c0392b;
        }

        /* Invoice Button */
        .eco-view-invoice-btn {
            display: inline-block;
            margin: 15px 25px 25px;
            padding: 10px 25px;
            border-radius: 30px;
            background: #176538;
            color: #ffffff;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            text-align: center;
        }

        .eco-view-invoice-btn:hover {
            background: linear-gradient(90deg, #0b9e48, #0e4726);
            transform: translateY(-2px);
        }

        /* Alerts */
        .eco-alert {
            font-weight: 500;
            border-radius: 10px;
            padding: 12px 20px;
            margin-bottom: 30px;
            background-color: #e6f6e6;
            color: #2a6b2a;
        }

        /* Responsive */
        @media(max-width: 768px) {
            .eco-order-meta {
                flex-direction: column;
                gap: 5px;
            }

            .eco-order-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }

        .eco-pagination .page-item.active .page-link {
            background-color: #2a6b2a;
            border-color: #2a6b2a;
            color: #fff;
        }

        .eco-pagination .page-link {
            color: #2a6b2a;
            border-radius: 8px;
            margin: 0 2px;
        }
    </style>
    <section class="contact-us-section bg-custm contact-padding fix position-relative">
        <!-- Particles background -->
        <div id="particles-js" class="particles"></div>

        <div class="container-fluid">
            <div class="conatct-main-wrapper">
                <div class="content p-5">
                    <h2>My Eco-Friendly Orders</h2>

                </div>
            </div>

        </div>
    </section>
    <section class="eco-orders-section">
        <div class="container">
            @if (session('success'))
                <div class="eco-alert text-center">
                    {{ session('success') }}
                </div>
            @endif
               
            @if ($orders->isEmpty())
                <div class="eco-alert text-center">You have no orders yet.</div>
            @else
                @foreach ($orders as $order)
                
                    <div class="eco-order-card">
                        @if ($order->status === 'pending')
                            <div class="eco-order-ribbon eco-ribbon-pending">Pending</div>
                        @elseif($order->status === 'approved')
                            <div class="eco-order-ribbon eco-ribbon-approved">Approved</div>
                        @elseif($order->status === 'rejected')
                            <div class="eco-order-ribbon eco-ribbon-rejected">Rejected</div>
                        @endif

                        <div class="eco-order-header">
                            <h3>Order #{{ $order->order_number }}</h3>
                            <span>{{ $order->created_at->format('d M Y, h:i A') }}</span>
                        </div>

                        <div class="eco-order-items">
                            <h4>Items</h4>
                            <ul>
                                @foreach ($order->items as $item)
                                    <li>{{ $item->product_name }} x {{ $item->quantity }} =
                                        ₹{{ number_format($item->subtotal, 2) }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="eco-order-meta">
                            <div><strong>Subtotal:</strong> ₹{{ number_format($order->subtotal, 2) }}</div>
                            <div><strong>Donation:</strong> ₹{{ number_format($order->donation ?? 0, 2) }}</div>
                            <div><strong>Total:</strong> ₹{{ number_format($order->total, 2) }}</div>
                            <div><strong>Payment:</strong> {{ ucfirst($order->payment_method) }}</div>
                            <div>
                                <strong>Status:</strong>
                                <span class="eco-status-badge eco-status-{{ strtolower($order->status) }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>

                        <a href="{{ route('order.invoicePdf', $order->id) }}" class="eco-view-invoice-btn">View Invoice</a>
                    </div>
                @endforeach

                <div class="d-flex justify-content-center mt-4 eco-pagination">
            
                </div>
            @endif
            
      @if($orders->count())
      
    <div class="d-flex justify-content-center mt-4 eco-pagination">
         {{-- {{ $orders->links() }} --}}

    </div>
    @endif
 

        </div>
    </section>
@endsection
