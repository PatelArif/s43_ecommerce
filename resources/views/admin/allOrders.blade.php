@push('title')
    <title>S4E Admin - All Orders</title>
@endpush

@include('admin.includes.header')

<!-- ✅ Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<div id="layoutSidenav">
    @include('admin.includes.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center pt-3 mb-4">
                <h2>All Orders</h2>
            </div>

            <div class="table-responsive mt-4">
                <table id="ordersTable" class="table table-hover table-bordered align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Sr No.</th>
                            <th>Order Id</th>
                            <th>User</th>
                            <th>Items</th>
                            <th>Subtotal</th>
                            <th>Donation</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Payment Slip</th>
                            <th>Invoice</th>

                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $index => $order)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ $order->order_id ?? 'N/A' }}</td>
                                <td class="text-center">{{ $order->user->name ?? 'N/A' }}</td>
                                <td>
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($order->items as $item)
                                            <li>{{ $item->product_name }} (x{{ $item->quantity }}) -
                                                ₹{{ number_format($item->subtotal, 2) }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="text-center">₹{{ number_format($order->subtotal, 2) }}</td>
                                <td class="text-center">₹{{ number_format($order->donation, 2) }}</td>
                                <td class="text-center">₹{{ number_format($order->total, 2) }}</td>
                                <td class="text-center">
                                    <span class="badge bg-info text-dark">
                                        {{ strtoupper($order->payment_method) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if ($order->payment_slip)
                                        <a href="{{ asset(config('constants.IMAGE_PATH') . $order->payment_slip) }}"
                                            target="_blank" class="btn btn-sm btn-outline-primary">
                                            View Slip
                                        </a>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if ($order->invoice_path)
                                        <a href="{{ asset(config('constants.IMAGE_PATH') . $order->invoice_path) }}"
                                            target="_blank" class="btn btn-sm btn-outline-success">
                                            Invoice
                                        </a>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>

                               <td class="text-center">
    @switch($order->status)

        @case('pending')
            <span class="badge bg-warning text-dark">Pending</span>
            @break

        @case('approved')
            <span class="badge bg-success">Approved</span>
            @break

        @case('ready')
            <span class="badge bg-primary">Ready to Dispatch</span>
            @break

        @case('dispatched')
            <span class="badge bg-info text-dark">Dispatched</span>
            @break

        @case('delivered')
            <span class="badge bg-dark">Delivered</span>
            @break

        @case('rejected')
            <span class="badge bg-danger">Rejected</span>
            @break

        @default
            <span class="badge bg-secondary">Unknown</span>

    @endswitch
</td>

   <td class="text-center">

    @if (!in_array($order->status, ['delivered', 'rejected']))

        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown">
                Select
            </button>

            <ul class="dropdown-menu">

                {{-- PENDING --}}
                @if ($order->status === 'pending')
                    <li>
                        <form action="{{ route('admin.orders.approve', $order->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-success">Approve</button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('admin.orders.reject', $order->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Reject</button>
                        </form>
                    </li>
                @endif

                {{-- APPROVED --}}
                @if ($order->status === 'approved')
                    <li>
                        <form action="{{ route('admin.orders.ready', $order->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-primary">Ready to Dispatch</button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('admin.orders.reject', $order->id) }}" method="POST"
                              onsubmit="return confirm('Reject this approved order?')">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Reject</button>
                        </form>
                    </li>
                @endif

                {{-- READY --}}
                @if ($order->status === 'ready')
                    <li>
                        <form action="{{ route('admin.orders.dispatch', $order->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-warning">Dispatch</button>
                        </form>
                    </li>
                @endif

                {{-- DISPATCHED --}}
                @if ($order->status === 'dispatched')
                    <li>
                        <form action="{{ route('admin.orders.deliver', $order->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-info">Mark Delivered</button>
                        </form>
                    </li>
                @endif

            </ul>
        </div>

    {{-- DELIVERED --}}
    @elseif ($order->status === 'delivered')
        <span class="badge bg-success">Delivered</span>

        @if($order->invoice_path)
            <div class="mt-1">
                <a href="{{ asset(config('constants.IMAGE_PATH') . $order->invoice_path) }}"
                   target="_blank"
                   class="btn btn-sm btn-outline-success">
                    Invoice
                </a>
            </div>
        @endif

    {{-- REJECTED --}}
    @else
        <span class="badge bg-danger">Rejected</span>
    @endif

</td>




                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center py-4">No orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>

        @include('admin.includes.footer')
    </div>
</div>

<!-- ✅ Include jQuery and DataTables JS (must come after footer) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- ✅ Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#ordersTable').DataTable({
            "pageLength": 10,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "ordering": true,
            "searching": true,
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Search orders..."
            },
            "columnDefs": [{
                    "orderable": false,
                    "targets": [3, 9]
                } // disable sorting for 'Items' and 'Actions'
            ]
        });
    });
</script>
