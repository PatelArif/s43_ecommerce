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
                        <h2> Products - ( {{$subcategory->name}} )</h2>
                      
                    </div>
                    </div>

                    </div>
     </section>
<!-- product-details-Section Start -->
<section class="product-details-section section-padding pt-5 fix">
    <div class="container">
        <div class="product-details-wrapper">
      
            <div class="product-details-sideber">
                <div class="product-details-wrap">
    
                    {{-- <p>Showing 1–14 of 26 results</p> --}}
                </div>
                {{-- <div class="shop-right">
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
                    <div id="openButton2">
                        <div class="filter-button">
                            <h6><a href="#"><span><img src="assets/img/filter.png" alt="img"></span>Filter</a></h6>
                        </div>
                    </div> 
                </div> --}}
            </div>

            <div class="tab-content">
                <div id="Course" class="tab-pane fade show active">
                    <div class="row">
                        @if($subcategory->products->count() > 0)
    @foreach($subcategory->products as $product)
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="product-card shadow-sm rounded-3 overflow-hidden h-100 d-flex flex-column">
                
                <!-- Product Image -->
                <div class="product-image">
                    <a href="{{ route('productDetails', $product->id) }}">
                        <img src="{{ asset('storage/' . $product->main_image) }}" 
                             alt="{{ $product->name }}" 
                             class="img-fluid w-100 fixed-img">
                    </a>
                    <div class="overlay d-flex justify-content-center align-items-center">
                        <a href="{{ url('product-details/'.$product->id) }}" class="icon-btn">
                            <i class="fa-regular fa-eye"></i>
                        </a>
                        <a href="#"class="icon-btn add-to-favorites-btn" data-id="{{ $product->id }}">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                         
                        <a href="#" class=" icon-btn  theme-btn add-to-cart-btn" 
                                    data-id="{{ $product->id }}" 
                                    data-url="{{ route('cart.add', $product->id) }}">
                            <i class="fa-regular fa-cart-shopping"></i>
                        </a>
                           {{-- <a href="{{ url('/checkout') }}" class="icon-btn">
                            <i class="fa-regular fa-cart-shopping"></i>
                        </a> --}}
                    </div>
                </div>

                <!-- Product Content -->
                <div class="content p-3 d-flex flex-column flex-grow-1 text-center">
                    <p class="text-muted small mb-1">Step For Environment</p>
                    <h5 class="fw-bold mb-2">
                        <a href="{{ url('product-details/'.$product->id) }}" class="product-title">
                            {{ $product->title }}
                        </a>
                    </h5>

                    <div class="star mb-2 text-warning">
                        @for($i = 0; $i < 5; $i++)
                            <i class="fa-solid fa-star"></i>
                        @endfor
                    </div>

                    <h6 class="mb-3">
                        <span class="fw-bold text-success">${{ $product->after_discount_price }}</span>
                        <del class="text-muted">${{ $product->price }}</del>
                        <span class="text-danger">-{{ $product->discount }}%</span>
                    </h6>

                    <!-- Button at bottom -->
                    <div class="mt-auto">
                        <a href="{{ url('/checkout') }}" class="btn btn-outline-success btn-sm rounded-pill w-100">
                            Buy Now <i class="fa-solid fa-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>  
    @endforeach
@else
    <div class="col-12">
        <div class="alert alert-warning text-center py-4 shadow-sm rounded-3">
            <i class="bi bi-box-seam fs-3 d-block mb-2 text-secondary"></i>
            <h5 class="fw-bold text-dark">No products available</h5>
            <p class="mb-0">Currently, there are no products listed under 
                <span class="fw-bold text-success">{{ $subcategory->name }}</span>.
            </p>
        </div>
    </div>
@endif

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
