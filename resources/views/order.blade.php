@include('includes.head')
@include('includes.header')
         <!-- Cart-order-Section Start -->
        <section class="cart-order-section section-padding fix">
            <div class="container">
                <div class="cart-order-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="order-content">
                                <h3>Order Tracking</h3>
                                <p>To track your order please enter your Order ID in the box below and press the <br> "Track" button. This was given to you on your receipt and in the confirmation <br> email you should have received.</p>
                                <form action="#" id="contact-form1" method="POST" class="contact-form-items">
                                    <div class="form-clt mb-3">
                                        <input type="text" name="name" id="name" placeholder="Username or email address*">
                                    </div>
                                    <div class="form-clt">
                                        <input type="text" name="name" id="name2" placeholder="Billing Email*">
                                    </div>
                                    <button type="submit" class="theme-btn mt-4">
                                        Tracking Orders
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

           @include('includes.footer')
