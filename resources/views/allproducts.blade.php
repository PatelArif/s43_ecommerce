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
                                        <img src="assets/img/shop/popup.jpg" alt="img">
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
                        <h2> {{$subcategory->name}}</h2>
                      
                    </div>
                    </div>

                    </div>
     </section>
<!-- product-details-Section Start -->
<section class="product-details-section section-padding pt-0 fix">
    <div class="container">
        <div class="product-details-wrapper">
      
            <div class="product-details-sideber">
                <div class="product-details-wrap">
    
                    {{-- <p>Showing 1–14 of 26 results</p> --}}
                </div>
                <div class="shop-right">
                    <div class="form-clt">
                        <div class="nice-select" tabindex="0">
                            <span class="current">
                                Default sorting
                            </span>
                            <ul class="list">
                                <li data-value="1" class="option selected focus">
                                    Default sorting
                                </li>
                                <li data-value="1" class="option">
                                    Sort by popularity
                                </li>
                                <li data-value="1" class="option">
                                    Sort by average rating
                                </li>
                                <li data-value="1" class="option">
                                    Sort by latest
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div id="openButton2">
                        <div class="filter-button">
                            <h6><a href="#"><span><img src="assets/img/filter.png" alt="img"></span>Filter</a></h6>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="tab-content">
                <div id="Course" class="tab-pane fade show active">
                    <div class="row">
                        @foreach($subcategory->products as $product)  <!-- Loop through products in this subcategory -->
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="product-details-item ">
                                    <div class="shop-image">
                                        <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{$product->title}}">
                                        {{-- <ul class="shop-icon d-grid justify-content-center align-items-center">
                                            <li>
                                                <a href="{{ route('productDetails', $product->id) }}"><i class="fa-regular fa-cart-shopping"></i></a>
                                            </li>
                                            <li>
                                                <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                    <i class="fa-regular fa-eye"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                                            </li>
                                        </ul> --}}
                                    </div>
                                    <div class="content">
                                        <p>{{ $product->store_name }}</p>
                                        <h4>
                                            <a href="{{ route('productDetails', $product->id) }}">{{ $product->name }}</a> 
                                        </h4>
                                        <div class="star">
                                            @for($i = 0; $i < 5; $i++)
                                                <i class="fa-solid fa-star"></i>
                                            @endfor
                                        </div>
                                        <h6>{{ $product->after_discount_price }}  <del>${{ $product->price }}</del> <span class="text-danger">-{{ $product->discount }}%</span></h6>
                                         <p class="text-danger p-5">  <a href="{{url('/checkout')}}" class="theme-btn">
                                                    <span> Buy now</span>
                                                </a></p> 
                                    </div>
                                    
                                </div>
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="page-nav-wrap">
                <ul>
                    <li class="active"><a class="page-numbers" href="#">1</a></li>
                    <li><a class="page-numbers" href="#">2</a></li>
                    <li><a class="page-numbers" href="#">3</a></li>
                    <li><a class="page-numbers" href="#"><i class="fa-solid fa-arrow-right-long"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

@include('includes.footer')
