@push('title')
<title>{{$subcategory->name}}</title>
@endpush
@include('includes.head')
@include('includes.header')


<!-- Modal Version 2 -->
<div class="modal modal-common-wrap fade" id="exampleModal2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="shop-details-wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="shop-details-image">
                                <div class="tab-content">
                                    <div class="shop-thumb">
                                        <img src="{{config('constants.ASSETS_PATH') }}img/shop/popup.jpg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details-content">
                                <h3 class="pb-3">Sulwhasoo Essential Cream</h3>
                                <div class="star pb-3">
                                    <a href="#"> <i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"> <i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <span>(25 Customer Review)</span>
                                </div>
                                <p class="mb-3">
                                    In today’s online world, a brand’s success lies in combining
                                    technological planning and social strategies to draw
                                    customers in–and keep them coming back
                                </p>
                                <div class="price-list">
                                    <h3>$1,260.00</h3>
                                </div>
                                <div class="cart-wrp">
                                    <div class="cart-quantity">
                                        <form id='myform' method='POST' class='quantity' action='#'>
                                            <input type='button' value='-' class='qtyminus minus'>
                                            <input type='text' name='quantity' value='0' class='qty'>
                                            <input type='button' value='+' class='qtyplus plus'>
                                        </form>
                                    </div>
                                    <a href="product-details.html" class="icon">
                                        <i class="far fa-heart"></i>
                                    </a>
                                    <div class="social-profile">
                                        <span class="plus-btn"><i class="far fa-share"></i></span>
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="shop-btn">
                                    <a href="shop-cart.html" class="theme-btn">
                                        <span> Add to cart</span>
                                    </a>
                                    <a href="product-details.html" class="theme-btn">
                                        <span> Buy now</span>
                                    </a>
                                </div>
                                <h6 class="details-info"><span>SKU:</span> <a href="product-details.html">124224</a></h6>
                                <h6 class="details-info"><span>Categories:</span> <a href="product-details.html">Crux Indoor Fast and Easy</a></h6>
                                <h6 class="details-info style-2"><span>Tags:</span> <a href="product-details.html"> <b>accessories</b> <b>business</b></a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <section class="contact-us-section bg-custm contact-padding fix position-relative">
    <!-- Particles background -->
    <div id="particles-js" class="particles"></div>

            <div class="container-fluid">
                <div class="conatct-main-wrapper">
                    <div class="content p-5">
                        <h2> Products - ( {{$subcategory->name}} )</h2>
                      
                    </div>
                    </div>

                    </div>
     </section>
     <section class="product-details-section section-padding pt-5 fix">
    <div class="container">
        <div class="product-details-wrapper">

            <div id="productWrapper">
                @include('includes.product-list', [
                    'products' => $products,
                    'subcategory' => $subcategory
                ])
            </div>

        </div>
    </div>
</section>

@include('includes.footer')
