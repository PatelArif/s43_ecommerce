@include('includes.head')
@include('includes.header')

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
                <table class="table common-table">
                    <thead data-aos="fade-down">
                        <tr>
                            <th class="text-center">Sr No.</th>
                            <th class="text-center">Product</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($cart) && count($cart) > 0)
                            @php $total = 0; $srNo = 1; @endphp
                            @foreach($cart as $id => $item)
                                @php 
                                    $subtotal = $item['price'] * $item['quantity']; 
                                    $total += $subtotal; 
                                @endphp
                                <tr id="cart-row-{{ $id }}" class="align-items-center">
                                    <td class="text-center">{{ $srNo++ }}</td>

                                    <!-- Product Column -->
                                    <td>
                                        <div class="cart-item-thumb d-flex align-items-center gap-2">
                                            <form action="{{ route('cart.remove', $id) }}" method="POST" class="remove-cart-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link p-0 text-danger" title="Remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>

                                            <img class="w-100" src="{{ $item['image'] }}" alt="{{ $item['name'] }}" style="max-width:60px;">
                                            <span class="head text-nowrap">{{ $item['name'] }}</span>
                                        </div>
                                    </td>

                                    <!-- Price Column -->
                                    <td class="text-center price-usd" data-price="{{ $item['price'] }}">₹{{ number_format($item['price'], 2) }}</td>

                                    <!-- Quantity Column -->
                                    <td class="text-center">
                                        <div class="quantity d-inline-flex align-items-center justify-content-center gap-1 py-2 px-4 border n50-border_20 text-sm">
                                            <button type="button" class="quantityDecrement btn-action" data-id="{{ $id }}" data-action="decrement">
                                                <i class="fal fa-minus"></i>
                                            </button>
                                            <input type="text" class="quantityValue text-center" value="{{ $item['quantity'] }}" readonly style="width:40px;">
                                            <button type="button" class="quantityIncrement btn-action" data-id="{{ $id }}" data-action="increment">
                                                <i class="fal fa-plus"></i>
                                            </button>
                                        </div>
                                    </td>

                                    <!-- Subtotal Column -->
                                    <td class="text-center price-usd" data-price="{{ $item['price'] }}">₹{{ number_format($item['price'], 2) }}</td>

                                </tr>
                            @endforeach

                            <!-- Donation Row -->
                            <tr>
                                <td class="text-center">{{ $srNo }}</td>
                                <td>
                                    Donation to Nature<br>
                                    <small style="font-weight: 500; color: green; font-size: 16px;">
                                        Help us make the planet greener!
                                    </small>
                                </td>
                                <td class="text-center">
                                    <span class="price-usd" id="fixed-donation" data-price="10">₹10</span>
                                </td>
                                <td class="text-center">
                                    <div class="quantity d-inline-flex align-items-center justify-content-center gap-1 py-2 px-4 border n50-border_20 text-sm">
                                        <button type="button" class="donation-decrement">
                                            <i class="fal fa-minus"></i>
                                        </button>
                                        <span id="donationAmount">10</span>
                                        <button type="button" class="donation-increment">
                                            <i class="fal fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="price-usd" id="subtotal-donation">₹10</span>
                                </td>
                            </tr>

                            <!-- Grand Total Row -->
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-end fw-bold">Grand Total:</td>
                                <td class="text-center fw-bold" id="grandTotal">₹{{ number_format($total + 10, 2) }}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5" class="text-center">Your cart is empty.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            @if(isset($cart) && count($cart) > 0)
                <div class="coupon-items d-flex flex-md-nowrap flex-wrap justify-content-between align-items-center gap-4 pt-4">
                    <form action="#" class="d-flex flex-sm-nowrap flex-wrap align-items-center gap-3">
                        <input type="text" placeholder="Enter coupon code">
                        <button type="submit" class="theme-btn alt-color radius-xs">Apply</button>
                    </form>
                    <a href="{{ route('checkout') }}" class="theme-btn alt-color radius-xs">Proceed to Checkout</a>
                </div>
            @endif
        </div>
    </div>
</div>

@include('includes.footer')
