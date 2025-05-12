@push('title')
<title>All Caregories</title>
@endpush
@include('includes.head')
@include('includes.header')

         <!-- Shop-categories-Section Start -->
        {{-- <div class="shop-categories-section section-padding">
            <div class="container">
                <div class="shop-categories-wrapper">
                    <div class="top-content">
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">All Categories</h2>
                        <ul class="list wow fadeInUp" data-wow-delay=".5s">
                            <li>Home</li>
                            <li>
                                All Categories
                            </li>
                        </ul>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-8 wow fadeInUp" data-wow-delay=".3s">
                            <div class="shop-categories-box">
                                <div class="content">
                                    <p>Sale 20% off all store</p>
                                    <h3>
                                        <a href="product-details.html">
                                            Smartphone <br>
                                            BLU G91 Pro 2022
                                        </a>
                                    </h3>
                                    <a href="product-details.html" class="link-btn-2">Shop Now <i class="fa-regular fa-arrow-right"></i></a>
                                </div>
                                <div class="phone-image">
                                    <img src="assets/img/shop/phone-image.png" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 wow fadeInUp" data-wow-delay=".5s">
                            <div class="shop-categories-item">
                               <div class="content">
                                <h4>
                                    HyperX Cloud II <br>
                                    Wireless
                                </h4>
                                <p>Sale 35% off</p>
                                <a href="product-details.html" class="link-btn-2">Shop Now <i class="fa-regular fa-arrow-right"></i></a>
                               </div>
                               <div class="categories-image">
                                <img src="assets/img/shop/head.png" alt="img">
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Shop-product-Section Start -->
        <section class="shop-product-section section-padding pt-0 fix">
            <div class="container">
                <div class="row g-4">
                 @foreach($categories as $category)
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="shop-product-item">
                            <div class="product-image">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                                <ul class="shop-icon d-flex justify-content-center align-items-center">
                                    <li>
                                        <a href="product-details.html"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.html"><i class="fa-regular fa-cart-shopping"></i></a>
                                    </li>
                                    <li>
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="shop-grid.html">{{ $category->name }}</a>
                                </h3>
                                <p>{{ $category->subcategories_count ?? '0' }} Products</p>
                                <a href="{{ url('/allCategories/' . $category->id) }}" class="link-btns">
                                    Shop Now <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach                     
                </div>
                {{-- <div class="shop-bottom">
                    <p class="wow fadeInUp" data-wow-delay=".3s">Showing 12 of 46 products</p>
                    <span class="text"></span>
                    <a href="product-details.html" class="theme-btn border-color wow fadeInUp" data-wow-delay=".5s">Load More</a>
                </div> --}}
                     </div>
        </section>

        <!-- Cta-Section Start -->
        <section class="cta-section fix">
            <div class="left-shape">
                <img src="assets/img/cta/shape-1.png" alt="img">
            </div>
            <div class="right-shape">
                <img src="assets/img/cta/shape-2.png" alt="img">
            </div>
            <div class="man-shape">
                <img src="assets/img/cta/shape-3.png" alt="img">
            </div>
            <div class="container">
                <div class="cta-wrapper">
                    <div class="cta-content">
                        <h6 class="wow fadeInUp" data-wow-delay=".3s">Sale 20% off all store</h6>
                        <h2 class="wow fadeInUp" data-wow-delay=".5s">Subscribe our Newsletter</h2>
                    </div>
                    <div class="search-widget wow fadeInUp" data-wow-delay=".3s">
                        <input type="email" id="email" placeholder="Enter Your Email">
                        <button type="submit" class="theme-btn">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>
        </section>

@include('includes.footer')
