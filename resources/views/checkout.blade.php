@include('includes.head')
@include('includes.header')

<style>
/* General styling */
.checkout-section {
    padding: 60px 0;
    background-color: #f5f5f5;
}
.checkout-wrapper {
    background: #fff;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.05);
}
.checkout-wrapper h4 {
    font-weight: 600;
    margin-bottom: 20px;
    color: #155a15;
}
.form-control[readonly] {
    background-color: #e9ecef;
    color: #495057;
}
#payment_method {
    width: 100%;
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 10px;
    appearance: none;
    background: #fff url("data:image/svg+xml;charset=US-ASCII,<svg xmlns='http://www.w3.org/2000/svg' width='14' height='14'><path fill='black' d='M7 10L3 4h8z'/></svg>") no-repeat right 12px center;
    background-size: 12px;
    color: #000;
}
.checkout-order-area {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}
.checkout-item {
    margin-bottom: 12px;
}
.total-amount {
    color: #155a15;
    font-size: 22px;
    font-weight: 700;
}
.payment-summary {
    background: #f3f9f3;
    padding: 15px;
    border-radius: 8px;
    margin-top: 15px;
}
.theme-btn {
    background-color: #155a15;
    color: #fff;
    font-weight: 600;
    border-radius: 8px;
    padding: 12px;
    width: 100%;
    border: none;
    cursor: pointer;
    transition: 0.3s;
}
.theme-btn:disabled {
    background-color: #a5d6a7;
    cursor: not-allowed;
}
.nice-select .option.selected.focus{
    color:#000;
}
.nice-select .option {
    color: #000;
}
</style>
      <section class="contact-us-section bg-custm contact-padding fix position-relative">
    <!-- Particles background -->
    <div id="particles-js" class="particles"></div>

            <div class="container-fluid">
                <div class="conatct-main-wrapper">
                    <div class="content p-5">
                        <h2>CheckOut</h2>
                      
                    </div>
                    </div>

                    </div>
                </section>
<section class="checkout-section">
    <div class="container">
        <div class="row g-4">

            <!-- Billing & Payment -->
            <div class="col-lg-8">
                <div class="checkout-wrapper">
                    <form id="checkoutForm" action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Billing Details (Read-only) -->
                        <div class="checkout-single mb-4">
                            <h4>Billing Details</h4>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->first_name ?? '' }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->last_name ?? '' }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{ auth()->user()->email ?? '' }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->mobile ?? auth()->user()->phone ?? '' }}" readonly>
                                </div>
                                <div class="col-12">
                                    <label>Address</label>
                                    <textarea class="form-control" rows="2" readonly>{{ auth()->user()->address_line ?? '' }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <label>City</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->city ?? '' }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>State</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->state ?? '' }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>ZIP</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->zip_code ?? '' }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Country</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->country ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="checkout-single mb-4">
                            <h4>Payment Method</h4>
                            <select name="payment_method" id="payment_method" required>
                                <option value="">Select Payment</option>
                                <option value="scanner">Scanner</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>

                            <div class="mt-3" id="paymentSlipContainer" style="display:none;">
                                <label>Upload Payment Slip</label>
                                <input type="file" name="payment_slip" id="paymentSlip" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <button type="submit" id="placeOrderBtn" class="theme-btn" disabled>Place Order</button>
                    </form>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="checkout-order-area">
                    <h4>Your Order</h4>
                    @foreach($cartItems as $item)
                        <div class="checkout-item d-flex justify-content-between">
                            <p>{{ $item->product->title }} (x{{ $item->quantity }})</p>
                            <p>₹{{ number_format($item->product->price * $item->quantity, 2) }}</p>
                        </div>
                    @endforeach

                    <hr>

                    <div class="checkout-item d-flex justify-content-between">
                        <p>Subtotal</p>
                        <p>₹{{ number_format($subtotal, 2) }}</p>
                    </div>

                    <div class="checkout-item d-flex justify-content-between">
                        <p>Donation</p>
                        <p>₹{{ session('donation', 0) }}</p>
                    </div>

                    <div class="checkout-item d-flex justify-content-between total-amount">
                        <p>Total</p>
                        <p>₹{{ number_format($subtotal + session('donation', 0), 2) }}</p>
                    </div>

                    <!-- Payment Summary -->
                    <div class="payment-summary" id="paymentSummary" style="display:none;">
                        <div id="paymentScanner" style="display:none;">
                            <p><b>Scan QR Code:</b></p>
                            <img src="{{ asset('assets/img/payment/StepForEnvironment.png') }}" width="100%">
                        </div>
                        <div id="paymentBank" style="display:none;">
                            <p><b>Bank Name :</b> Bank Of India</p>
                            <p><b>Account No:</b> 14578458965</p>
                            <p><b>IFSC Code:</b> BOIB056892</p>
                            <p><b>Branch Name:</b> Ghatkopar (West), Mumbai-4160117</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@include('includes.footer')

<script>
$(document).ready(function () {
    const $paymentMethod = $('#payment_method');
    const $paymentSlipContainer = $('#paymentSlipContainer');
    const $paymentSummary = $('#paymentSummary');
    const $paymentScanner = $('#paymentScanner');
    const $paymentBank = $('#paymentBank');
    const $placeOrderBtn = $('#placeOrderBtn');
    const $paymentSlip = $('#paymentSlip');

    // Initialize niceSelect if available
    if ($.fn.niceSelect) {
        $paymentMethod.niceSelect();
    }

    function updatePaymentDisplay(val) {
        console.log('Selected payment value is:', val);

        // Reset everything
        $paymentSlipContainer.hide();
        $paymentSummary.hide();
        $paymentScanner.hide();
        $paymentBank.hide();
        $placeOrderBtn.prop('disabled', true);

        if (val === 'scanner') {
            console.log('Scanner selected → show QR');
            $paymentSummary.show();
            $paymentScanner.show();
            $paymentSlipContainer.show();
            $placeOrderBtn.prop('disabled', !$paymentSlip.val());

        } else if (val === 'bank_transfer') {
            console.log('Bank Transfer selected → show bank details & slip upload');
            $paymentSummary.show();
            $paymentBank.show();
            $paymentSlipContainer.show();
            $placeOrderBtn.prop('disabled', !$paymentSlip.val());
        } else {
            console.log('No payment method selected');
        }
    }

    // Listen to both native & nice-select changes
    $paymentMethod.on('change', function () {
        const val = $(this).val();
        console.log('Dropdown changed → value is:', val);
        updatePaymentDisplay(val);
    });

    // Sometimes nice-select triggers click instead of change
    $(document).on('click', '.nice-select .option', function () {
        const val = $(this).data('value');
        console.log('Nice-select clicked → value is:', val);
        updatePaymentDisplay(val);
    });

    // File upload change
    $paymentSlip.on('change', function () {
        const hasFile = $(this).val() !== '';
        console.log('Payment slip uploaded:', hasFile);
        $placeOrderBtn.prop('disabled', !hasFile);
    });

    // Initial check
    updatePaymentDisplay($paymentMethod.val());
});


</script>
