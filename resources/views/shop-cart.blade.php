@include('includes.head')
@include('includes.header')

<style>
.swal2-input {
    color:#000!important;
}
.quantityValue {
    width: 40px;
    text-align: center;
}
</style>

<section class="contact-us-section bg-custm contact-padding fix position-relative">
    <div id="particles-js" class="particles"></div>
    <div class="container-fluid">
        <div class="conatct-main-wrapper">
            <div class="content p-5">
                <h2>Shopping Cart</h2>
            </div>
        </div>
    </div>
</section>

<div class="cart-section section-padding pt-4">
    <div class="container">
        <div class="cart-list-area">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle" id="data-table">
                    <thead>
                        <tr>
                            <th class="text-center">Sr No.</th>
                            <th class="text-center">Product Image</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($cart) && count($cart) > 0)
                            @php 
                                $srNo = 1; 
                                $donation = session('donation', 0);
                                $grandTotalWithDonation = $grandTotal + $donation;
                            @endphp

                            @foreach($cart as $item)
                                <tr id="cart-row-{{ $item['id'] }}">
                                    <td class="text-center">{{ $srNo++ }}</td>
                                    <td>
                                        <div class="cart-item-thumb d-flex align-items-center gap-2">
                                            <form action="{{ route('cart.remove', $item['product_id']) }}" method="POST" class="remove-cart-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link p-0 text-danger" title="Remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                            <img class="w-100" src="{{ asset('public/storage/' . $item['image']) }}" alt="{{ $item['name'] }}" style="max-width:150px;">
                                        </div>
                                    </td>
                                    <td style="white-space: normal; word-wrap: break-word; max-width:200px;">
                                        <p class="head">{{ $item['name'] }}</p>
                                    </td>
                                    <td class="text-center">₹{{ number_format($item['price'], 2) }}</td>
                                    <td class="text-center">
                                        <div class="quantity d-inline-flex align-items-center gap-1 py-2 px-4 border n50-border_20 text-sm">
                                            <button type="button" class="btn-action" data-id="{{ $item['id'] }}" data-action="decrement">
                                                <i class="fal fa-minus"></i>
                                            </button>
                                            <input type="text" class="quantityValue" value="{{ $item['quantity'] }}" readonly>
                                            <button type="button" class="btn-action" data-id="{{ $item['id'] }}" data-action="increment">
                                                <i class="fal fa-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="text-center">₹{{ number_format($item['subtotal'], 2) }}</td>
                                </tr>
                            @endforeach
                                   @if(!empty($donation) && $donation > 0)
    <tr>
        <td colspan="5" class="text-end fw-bold">Donation:</td>
        <td class="text-center">
            ₹<span id="cartDonation">{{ number_format($donation, 2) }}</span>
        </td>
    </tr>
@endif

                            <tr>
                                <td colspan="5" class="text-end fw-bold">Grand Total:</td>
                                <td class="text-center fw-bold">₹<span id="grandTotal">{{ $grandTotalWithDonation }}</span></td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="6" class="text-center">Your cart is empty.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            @if(isset($cart) && count($cart) > 0)
                <div class="coupon-items flex-wrap pt-4" style="text-align: right;">
                    {{-- <button class="theme-btn alt-color radius-xs" id="addDonation">Add Donation</button> --}}
                    <a href="#" class="theme-btn alt-color radius-xs checkoutBtn">Proceed to Checkout</a>
                </div>
            @else
                <div class="coupon-items flex-wrap pt-4" style="text-align: right;">
                    <a href="{{ url('/') }}" class="theme-btn alt-color radius-xs">Continue Shopping</a>
                </div>
            @endif

        </div>
    </div>
</div>

@include('includes.footer')

<script>
/** ✅ Update Quantity **/
$(document).on('click', '.btn-action', function () {
    let id = $(this).data('id');
    let action = $(this).data('action');

    $.ajax({
        url: '/cart/update/' + id,
        type: 'POST',
        data: {
            action: action,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {
            location.reload();
        }
    });
});

/** ✅ Add Donation **/
$(document).on('click', '#addDonation', function (e) {
    e.preventDefault();
    Swal.fire({
        title: 'Enter your donation amount',
        input: 'number',
        inputValue: 10,
        inputAttributes: { min: 10, step: 10 },
        showCancelButton: true,
        confirmButtonText: 'Add Donation',
        preConfirm: (donation) => {
            if(donation < 10 || donation % 10 !== 0){
                Swal.showValidationMessage("Donation must be at least ₹10 and multiples of 10");
            }
            return donation;
        }
    }).then((result) => {
        if(result.isConfirmed){
            $.post("{{ route('cart.donation') }}", {donation: result.value, _token: '{{ csrf_token() }}'}, function(response){
                location.reload();
            });
        }
    });
});

/** ✅ Checkout with optional donation **/
$(document).on('click', '.checkoutBtn', function(e){
    e.preventDefault();
    Swal.fire({
        title: 'Support Nature?',
        text: "Add a small donation (Min ₹10, multiples of 10)",
        icon: 'question',
        input: 'number',
        inputValue: {{ session('donation', 10) }},
        inputAttributes: { min: 10, step: 10 },
        showCancelButton: true,
        confirmButtonText: 'Yes, Add Donation',
        cancelButtonText: 'No, Continue',
        preConfirm: (donation) => {
            if(donation < 10 || donation % 10 !== 0){
                Swal.showValidationMessage("Donation must be at least ₹10 and multiples of 10");
            }
            return donation;
        }
    }).then((result) => {
        let donation = result.isConfirmed ? result.value : 0;
        $.post("{{ route('cart.donation') }}", {donation: donation, _token: '{{ csrf_token() }}'}, function(response){
            window.location.href = "{{ route('checkout') }}";
        });
    });
});
</script>
