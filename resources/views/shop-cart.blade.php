@include('includes.head')
@include('includes.header')
        <!-- cart section start -->
     <div class="cart-section section-padding">
            <div class="container">
                <div class="cart-list-area">
                    <div class="top-content">
                        <h2>Shopping Cart</h2>
                        <ul class="list">
                            <li>
                                <a href="index-2.html">Home</a>
                            </li>
                            <li>
                                Shopping Cart
                            </li>
                        </ul>
                    </div>
                    <div class="table-responsive">
                        <table class="table common-table">
                            <thead data-aos="fade-down">
                                <tr>
                                    <th class="text-center">Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-items-center py-3">
                                    <td>
                                        <div class="cart-item-thumb d-flex align-items-center gap-4">
                                            <i class="fas fa-times"></i>
                                            <img class="w-100" src="assets/img/cart/03.jpg" alt="product">
                                            <span class="head text-nowrap">A Prayer for Meany</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="price-usd">
                                            $12.40 USD
                                        </span>
                                    </td>
                                    <td class="price-quantity text-center">
                                        <div
                                        class="quantity d-inline-flex align-items-center justify-content-center gap-1 py-2 px-4 border n50-border_20 text-sm">
                                        <button class="quantityDecrement"><i class="fal fa-minus"></i></button>
                                        <input type="text" value="1" class="quantityValue">
                                        <button class="quantityIncrement"><i class="fal fa-plus"></i></button>
                                    </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="price-usd">
                                            $12.40 USD
                                        </span>
                                    </td>
                                </tr>
                                <tr class="align-items-center py-3">
                                    <td>
                                        <div class="cart-item-thumb d-flex align-items-center gap-4">
                                            <i class="fas fa-times"></i>
                                            <img class="w-100" src="assets/img/cart/04.jpg" alt="product">
                                            <span class="head text-nowrap">Don Quixote</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="price-usd">
                                            $25.50 USD
                                        </span>
                                    </td>
                                    <td class="price-quantity text-center">
                                        <div
                                            class="quantity d-inline-flex align-items-center justify-content-center gap-1 py-2 px-4 border n50-border_20 text-sm">
                                            <button class="quantityDecrement"><i class="fal fa-minus"></i></button>
                                            <input type="text" value="1" class="quantityValue">
                                            <button class="quantityIncrement"><i class="fal fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="price-usd">
                                            $25.50 USD
                                        </span>
                                    </td>
                                </tr>
                                <tr class="align-items-center py-3">
                                    <td>
                                        <div class="cart-item-thumb d-flex align-items-center gap-4">
                                            <i class="fas fa-times"></i>
                                            <img class="w-100" src="assets/img/cart/05.jpg" alt="product">
                                            <span class="head text-nowrap">Don Quixote</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="price-usd">
                                            $44.50 USD
                                        </span>
                                    </td>
                                    <td class="price-quantity text-center">
                                        <div
                                            class="quantity d-inline-flex align-items-center justify-content-center gap-1 py-2 px-4 border n50-border_20 text-sm">
                                            <button class="quantityDecrement"><i class="fal fa-minus"></i></button>
                                            <input type="text" value="1" class="quantityValue">
                                            <button class="quantityIncrement"><i class="fal fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="price-usd">
                                            $44.50 USD
                                        </span>
                                    </td>
                                </tr>
                                <tr class="align-items-center py-3">
                                    <td>
                                        <div class="cart-item-thumb d-flex align-items-center gap-4">
                                            <i class="fas fa-times"></i>
                                            <img class="w-100" src="assets/img/cart/06.jpg" alt="product">
                                            <span class="head text-nowrap">Don Quixote</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="price-usd">
                                            $39.50 USD
                                        </span>
                                    </td>
                                    <td class="price-quantity text-center">
                                        <div
                                            class="quantity d-inline-flex align-items-center justify-content-center gap-1 py-2 px-4 border n50-border_20 text-sm">
                                            <button class="quantityDecrement"><i class="fal fa-minus"></i></button>
                                            <input type="text" value="1" class="quantityValue">
                                            <button class="quantityIncrement"><i class="fal fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="price-usd">
                                            $39.50 USD
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="coupon-items d-flex flex-md-nowrap flex-wrap justify-content-between align-items-center gap-4 pt-4">
                        <form action="#" class="d-flex flex-sm-nowrap flex-wrap align-items-center gap-3">
                            <input type="text"
                                placeholder="Enter coupon code">
                            <button type="submit" class="theme-btn alt-color radius-xs">Apply</button>
                        </form>
                        <button type="button" class="theme-btn alt-color radius-xs">Update Cart</button>
                    </div>
                </div>
            </div>
        </div>


                  @include('includes.footer')
