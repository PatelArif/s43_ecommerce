@include('includes.head')
@include('includes.header')
   

          <!-- Modal Version 2 -->
@include('includes.productView')
     
         <!-- Hero Section Start -->
         <section class="hero-section-3">
            <div class="arrow-button">
                <button class="array-prev">
                    <i class="fa-light fa-chevron-left"></i>
                </button>
                <button class="array-next">
                    <i class="fa-light fa-chevron-right"></i>
                </button>
            </div>
            <div class="swiper hero-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="hero-3">
                            <div class="hero-bg bg-cover" style="background-image: url(assets/img/slider/4.jpg);">
                            </div>
                                <div class="container">
                                    <div class="row g-4">
                                        <div class="col-lg-10">
                                            <div class="hero-content">
                                               
                                                <h1 class="text-white" data-animation="fadeInUp" data-delay="1.5s">
                                                   Eco Friendly and <br> Sustainable Bags
                                                </h1>
                                                <div class="hero-button" data-animation="fadeInUp" data-delay="1.7s">
                                                    <a href="{{url('/product-details')}}" class="theme-btn">Shop Now <i class="fa-regular fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="hero-3">
                            <div class="hero-bg bg-cover" style="background-image: url(assets/img/slider/1.jpg);">
                            </div>
                                <div class="container">
                                    <div class="row g-4">
                                        <div class="col-lg-10">
                                            <div class="hero-content">
                                                <h1  class="text-white" data-animation="fadeInUp" data-delay="1.5s">
                                                   Eco Friendly and <br> Sustainable Bags
                                                </h1>
                                                <div class="hero-button" data-animation="fadeInUp" data-delay="1.7s">
                                                    <a href="{{url('/product-details')}}" class="theme-btn">Shop Now <i class="fa-regular fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="hero-3">
                            <div class="hero-bg bg-cover" style="background-image: url(assets/img/slider/2.jpg);">
                            </div>
                                <div class="container">
                                    <div class="row g-4">
                                        <div class="col-lg-10">
                                            <div class="hero-content ">
                                                <h1 class="" data-animation="fadeInUp" data-delay="1.5s">
                                                   Eco Friendly and <br> Sustainable Bags
                                                </h1>
                                                <div class="hero-button" data-animation="fadeInUp" data-delay="1.7s">
                                                    <a href="{{url('/product-details')}}" class="theme-btn">Shop Now <i class="fa-regular fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>

          <!-- Feature-Section Start -->
          <section class="feature-section fix">
            <div class="container">
                <div class="feature-wrapper">
                    <div class="feature-item style-2 wow fadeInUp" data-wow-delay=".2s">
                        <div class="icon">
                            <img src="assets/img/icon/01.svg" alt="img">
                        </div>
                        <div class="content">
                            <h6>
                                Free Delivary
                            </h6>
                            <p>Orders from all item</p>
                        </div>
                    </div>
                    <div class="feature-item wow fadeInUp" data-wow-delay=".4s">
                        <div class="icon">
                            <img src="assets/img/icon/02.svg" alt="img">
                        </div>
                        <div class="content">
                            <h6>
                                Return & Refunf
                            </h6>
                            <p>Maney back guarantee</p>
                        </div>
                    </div>
                    <div class="feature-item wow fadeInUp" data-wow-delay=".6s">
                        <div class="icon">
                            <img src="assets/img/icon/03.svg" alt="img">
                        </div>
                        <div class="content">
                            <h6>
                                Member Discount
                            </h6>
                            <p>Onevery order over ₹140.00</p>
                        </div>
                    </div>
                    <div class="feature-item wow fadeInUp" data-wow-delay=".8s">
                        <div class="icon">
                            <img src="assets/img/icon/04.svg" alt="img">
                        </div>
                        <div class="content">
                            <h6>
                                Support 24/7
                            </h6>
                            <p>Contact us 24 hours a day</p>
                        </div>
                    </div>
                </div>
            </div>
         </section>

         <!-- Shop-bg-section Start -->
         <section class="shop-bg-section fix">
            <div class="row g-4">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="bg-image bg-cover" style="background-image: url(assets/img/hero/multipurpose.png);">
                        <div class="content">
                            <h3>
                                <a href="{{url('shop-grid')}}">multipurpose Reusable bags</a>
                            </h3>
                          <p class="text-black" >2025 Collection</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-image style-2 bg-cover" style="background-image: url(assets/img/hero/jute.png);">
                        <div class="content text-white">
                            <h3 >
                                <a class="text-white"href="{{url('shop-grid')}}">Tote Bags , Reusable Canvas Bags</a>
                            </h3>
                            <p class="text-white" >2025 Collection</p>
                        </div>
                    </div>
                    <div class="bg-image mt-20 style-2 bg-cover" style="background-image: url(assets/img/hero/jute1.png);">
                        <div class="content">
                            <h3>
                                <a href="{{url('shop-grid')}}">Jute Bags </a>
                            </h3>
                             <p class="text-black" >2025 Collection</p>
                        </div>
                    </div>
                </div>
            </div>
         </section>

          <!-- Product-store-section Start -->
         <section class="product-store-section section-padding fix">
            <div class="container">
                <div class="section-title text-center">
                    <h6 class="sub-title wow fadeInUp">
                        Top views in this week
                    </h6>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        Our Product In Store
                    </h2>
                </div>
               <div class="product-wrapper">
                {{-- <ul class="nav">
                    <li class="nav-item wow fadeInUp" data-wow-delay=".3s">
                        <a href="#Course" data-bs-toggle="tab" class="nav-link active">
                            New Products
                        </a>
                    </li>
                    <li class="nav-item wow fadeInUp" data-wow-delay=".5s">
                        <a href="#Curriculum" data-bs-toggle="tab" class="nav-link">
                            Featured Products
                        </a>
                    </li>
                    <li class="nav-item wow fadeInUp" data-wow-delay=".5s">
                        <a href="#Instructors" data-bs-toggle="tab" class="nav-link">
                            On Sale Products
                        </a>
                    </li>
                    <li class="nav-item wow fadeInUp" data-wow-delay=".5s">
                        <a href="#Reviews" data-bs-toggle="tab" class="nav-link bb-none">
                            Trending Products
                        </a>
                    </li>
                </ul> --}}
                <div class="tab-content">
                    <div id="Course" class="tab-pane fade show active">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-store-item">
                                    <div class="product-image">
                                        <img src="assets/img/product/jute1.png" alt="img">
                                        <div class="sale-box">
                                            {{-- <div class="box">20% off</div> --}}
                                        </div>
                                 
                                        <div class="cart-btn">
                                            <a href="{{url('/shop-cart')}}" class="theme-btn"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                        </div>
                                        <ul class="social-icon">
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-cart-shopping"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                    <i class="fa-regular fa-eye"></i>
                                               </button>
                                            </li>
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-content">
                                        <div class="content">
                                            <span>
                                                Eco-Friendly
                                            </span>
                                            <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-duotone fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <h5>
                                            <a href="{{url('/product-details')}}">Reusable Canvas Bag</a>
                                        </h5>
                                        <h6>₹150.00 <del>₹220.00</del></h6>
                               
                                    </div>
                                </div>
                            </div>
                           <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-store-item">
                                    <div class="product-image">
                                        <img src="assets/img/product/2.png" alt="img">
                                        <div class="sale-box">
                                            {{-- <div class="box">20% off</div> --}}
                                        </div>
                                 
                                        <div class="cart-btn">
                                            <a href="{{url('/shop-cart')}}" class="theme-btn"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                        </div>
                                        <ul class="social-icon">
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-cart-shopping"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                    <i class="fa-regular fa-eye"></i>
                                               </button>
                                            </li>
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-content">
                                        <div class="content">
                                            <span>
                                                Eco-Friendly
                                            </span>
                                            <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-duotone fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <h5>
                                            <a href="{{url('/product-details')}}">Reusable Canvas Bag</a>
                                        </h5>
                                        <h6>₹150.00 <del>₹220.00</del></h6>
                               
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-store-item">
                                    <div class="product-image">
                                        <img src="assets/img/product/3.png" alt="img">
                                        <div class="sale-box">
                                            {{-- <div class="box">20% off</div> --}}
                                        </div>
                                 
                                        <div class="cart-btn">
                                            <a href="{{url('/shop-cart')}}" class="theme-btn"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                        </div>
                                        <ul class="social-icon">
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-cart-shopping"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                    <i class="fa-regular fa-eye"></i>
                                               </button>
                                            </li>
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-content">
                                        <div class="content">
                                            <span>
                                                Eco-Friendly
                                            </span>
                                            <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-duotone fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <h5>
                                            <a href="{{url('/product-details')}}">Reusable Canvas Bag</a>
                                        </h5>
                                        <h6>₹150.00 <del>₹220.00</del></h6>
                               
                                    </div>
                                </div>
                            </div>
                           <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-store-item">
                                    <div class="product-image">
                                        <img src="assets/img/product/4.png" alt="img">
                                        <div class="sale-box">
                                            {{-- <div class="box">20% off</div> --}}
                                        </div>
                                 
                                        <div class="cart-btn">
                                            <a href="{{url('/shop-cart')}}" class="theme-btn"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                        </div>
                                        <ul class="social-icon">
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-cart-shopping"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                    <i class="fa-regular fa-eye"></i>
                                               </button>
                                            </li>
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-content">
                                        <div class="content">
                                            <span>
                                                Eco-Friendly
                                            </span>
                                            <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-duotone fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <h5>
                                            <a href="{{url('/product-details')}}">Reusable Canvas Bag</a>
                                        </h5>
                                        <h6>₹150.00 <del>₹220.00</del></h6>
                               
                                    </div>
                                </div>
                            </div>
                           <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-store-item">
                                    <div class="product-image">
                                        <img src="assets/img/product/5.png" alt="img">
                                        <div class="sale-box">
                                            {{-- <div class="box">20% off</div> --}}
                                        </div>
                                 
                                        <div class="cart-btn">
                                            <a href="{{url('/shop-cart')}}" class="theme-btn"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                        </div>
                                        <ul class="social-icon">
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-cart-shopping"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                    <i class="fa-regular fa-eye"></i>
                                               </button>
                                            </li>
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-content">
                                        <div class="content">
                                            <span>
                                                Eco-Friendly
                                            </span>
                                            <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-duotone fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <h5>
                                            <a href="{{url('/product-details')}}">Reusable Canvas Bag</a>
                                        </h5>
                                        <h6>₹150.00 <del>₹220.00</del></h6>
                               
                                    </div>
                                </div>
                            </div>
                           <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-store-item">
                                    <div class="product-image">
                                        <img src="assets/img/product/6.png" alt="img">
                                        <div class="sale-box">
                                            {{-- <div class="box">20% off</div> --}}
                                        </div>
                                 
                                        <div class="cart-btn">
                                            <a href="{{url('/shop-cart')}}" class="theme-btn"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                        </div>
                                        <ul class="social-icon">
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-cart-shopping"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                    <i class="fa-regular fa-eye"></i>
                                               </button>
                                            </li>
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-content">
                                        <div class="content">
                                            <span>
                                                Eco-Friendly
                                            </span>
                                            <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-duotone fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <h5>
                                            <a href="{{url('/product-details')}}">Reusable Canvas Bag</a>
                                        </h5>
                                        <h6>₹150.00 <del>₹220.00</del></h6>
                               
                                    </div>
                                </div>
                            </div>
                           <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-store-item">
                                    <div class="product-image">
                                        <img src="assets/img/product/7.png" alt="img">
                                        <div class="sale-box">
                                            {{-- <div class="box">20% off</div> --}}
                                        </div>
                                 
                                        <div class="cart-btn">
                                            <a href="{{url('/shop-cart')}}" class="theme-btn"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                        </div>
                                        <ul class="social-icon">
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-cart-shopping"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                    <i class="fa-regular fa-eye"></i>
                                               </button>
                                            </li>
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-content">
                                        <div class="content">
                                            <span>
                                                Eco-Friendly
                                            </span>
                                            <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-duotone fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <h5>
                                            <a href="{{url('/product-details')}}">Reusable Canvas Bag</a>
                                        </h5>
                                        <h6>₹150.00 <del>₹220.00</del></h6>
                               
                                    </div>
                                </div>
                            </div>
                           <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-store-item">
                                    <div class="product-image">
                                        <img src="assets/img/product/8.png" alt="img">
                                        <div class="sale-box">
                                            {{-- <div class="box">20% off</div> --}}
                                        </div>
                                 
                                        <div class="cart-btn">
                                            <a href="{{url('/shop-cart')}}" class="theme-btn"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                        </div>
                                        <ul class="social-icon">
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-cart-shopping"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                    <i class="fa-regular fa-eye"></i>
                                               </button>
                                            </li>
                                            <li>
                                                <a href="{{url('/product-details')}}"><i class="fa-regular fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-content">
                                        <div class="content">
                                            <span>
                                                Eco-Friendly
                                            </span>
                                            <div class="star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-duotone fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <h5>
                                            <a href="{{url('/product-details')}}">Reusable Canvas Bag</a>
                                        </h5>
                                        <h6>₹150.00 <del>₹220.00</del></h6>
                               
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     
                   
                 </div>
                </div>
             </div>
         </section>

          <!-- Shop-category-section Start -->
         <section class="shop-category-section section-padding fix section-bg">
            <div class="container">
                <div class="section-title-area">
                    <div class="section-title">
                        <h6 class="sub-title wow fadeInUp">
                            Shop by Category
                        </h6>
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">
                            This Week's Featured
                        </h2>
                    </div>
                    <div class="array-buttons">
                        <button class="array-prev">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                        <button class="array-next">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <div class="shop-category-wrapper">
                    <div class="swiper shop-slider-4">
                        <div class="swiper-wrapper">
                           <div class="swiper-slide">
                            <div class="shop-category-box">
                                <div class="content">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <h3>
                                        <a href="{{url('/product-details')}}">
                                            Vera Bradley
                                            Straw Tote Bag
                                        </a>
                                    </h3>
                                    <h4>₹46.00 <del>₹96.00</del></h4>
                                    <a href="{{url('/product-details')}}" class="theme-btn">Shop Now <i class="fa-regular fa-arrow-right"></i></a>
                                </div>
                                <div class="shop-image max-width-2">
                                    <img src="assets/img/shop/19.png" alt="img">
                                </div>
                              </div>
                           </div>
                           <div class="swiper-slide">
                           <div class="shop-category-box">
                                <div class="content">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <h3>
                                        <a href="{{url('/product-details')}}">
                                            Vera Bradley
                                            Straw Tote Bag
                                        </a>
                                    </h3>
                                    <h4>₹46.00 <del>₹96.00</del></h4>
                                    <a href="{{url('/product-details')}}" class="theme-btn">Shop Now <i class="fa-regular fa-arrow-right"></i></a>
                                </div>
                                <div class="shop-image max-width-2">
                                    <img src="assets/img/shop/19.png" alt="img">
                                </div>
                              </div>
                           </div>
                           <div class="swiper-slide">
                            <div class="shop-category-box">
                                <div class="content">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <h3>
                                        <a href="{{url('/product-details')}}">
                                            Vera Bradley
                                            Straw Tote Bag
                                        </a>
                                    </h3>
                                    <h4>₹46.00 <del>₹96.00</del></h4>
                                    <a href="{{url('/product-details')}}" class="theme-btn">Shop Now <i class="fa-regular fa-arrow-right"></i></a>
                                </div>
                                <div class="shop-image max-width-2">
                                    <img src="assets/img/shop/19.png" alt="img">
                                </div>
                              </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>

         <!-- shop-discover-section Start -->
         <section class="shop-discover-section section-padding fix">
            <div class="container">
                <div class="section-title-area">
                    <div class="section-title">
                        <h6 class="sub-title wow fadeInUp">
                            More to Discover
                        </h6>
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">
                            Trending Arrivals
                        </h2>
                    </div>
                    <a href="news.html" class="theme-btn theme-btn-2 wow fadeInUp" data-wow-delay=".5s">View More Items</a>
                </div>
                <div class="shop-discover-wrapper">
                    <div class="row g-5">
                        <div class="col-lg-6">
                            <div class="swiper discover-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="shop-discover-item">
                                            <div class="shop-image">
                                                <img src="assets/img/shop/20.jpg" alt="img">
                                            </div>
                                            <div class="content">
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <p>Whitetails Store</p>
                                                <h4>
                                                    <a href="{{url('/product-details')}}">Whitetails Women's Open Sky</a>
                                                </h4>
                                                <h6>₹76.00 <del>₹84.00</del></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="shop-discover-item">
                                            <div class="shop-image">
                                                <img src="assets/img/shop/21.jpg" alt="img">
                                            </div>
                                            <div class="content">
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <p>Whitetails Store</p>
                                                <h4>
                                                    <a href="{{url('/product-details')}}">Whitetails Women's Open Sky</a>
                                                </h4>
                                                <h6>₹76.00 <del>₹84.00</del></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="shop-discover-item">
                                            <div class="shop-image">
                                                <img src="assets/img/shop/20.jpg" alt="img">
                                            </div>
                                            <div class="content">
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <p>Whitetails Store</p>
                                                <h4>
                                                    <a href="{{url('/product-details')}}">Whitetails Women's Open Sky</a>
                                                </h4>
                                                <h6>₹76.00 <del>₹84.00</del></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-dot-5">
                                <div class="dot-5"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="bg-image-2 bg-cover" style="background-image: url(assets/img/shop/22.jpg);">
                                <div class="content">
                                    <h3>
                                        <a href="{{url('/product-details')}}">
                                            Short Sleeve Tunic <br>
                                            Tops Casual Swing
                                        </a>
                                    </h3>
                                    <a href="{{url('/product-details')}}" class="theme-btn">Explore More <i class="fa-regular fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>

         <!-- Product-sell-section Start -->
         <section class="product-sell-section section-padding fix custom-container-4 pt-0">
            <div class="container">
                <div class="section-title text-center">
                    <h6 class="sub-title wow fadeInUp">
                        Top views in this week
                    </h6>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        Best Seller Products
                    </h2>
                </div>
                <div class="row">
                       
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product-sell-item">
                            <div class="product-image">
                               <img src="assets/img/product/6.png" alt="img">
                                <div class="cart-btn">
                                    <a href="{{url('/shop-cart')}}" class="theme-btn"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                </div>
                                <ul class="social-icon">
                                    <li>
                                        <a href="{{url('/product-details')}}"><i class="fa-regular fa-cart-shopping"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            <i class="fa-regular fa-eye"></i>
                                       </button>
                                    </li>
                                    <li>
                                        <a href="{{url('/product-details')}}"><i class="fa-regular fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="content">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-duotone fa-solid fa-star"></i>
                                    </div>
                                    <span>Eco-Friendly</span>
                                </div>
                                <h5>
                                    <a href="{{url('/product-details')}}">Reusable Canvas Bag</a>
                                </h5>
                                <h6>₹150.00 <del>₹220.00</del></h6>
                            </div>
                        </div>
                    </div>
                      <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product-sell-item">
                            <div class="product-image">
                               <img src="assets/img/product/jute1.png" alt="img">
                                <div class="cart-btn">
                                    <a href="{{url('/shop-cart')}}" class="theme-btn"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                </div>
                                <ul class="social-icon">
                                    <li>
                                        <a href="{{url('/product-details')}}"><i class="fa-regular fa-cart-shopping"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            <i class="fa-regular fa-eye"></i>
                                       </button>
                                    </li>
                                    <li>
                                        <a href="{{url('/product-details')}}"><i class="fa-regular fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="content">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-duotone fa-solid fa-star"></i>
                                    </div>
                                    <span>Eco-Friendly</span>
                                </div>
                                <h5>
                                    <a href="{{url('/product-details')}}">Reusable Canvas Bag</a>
                                </h5>
                                <h6>₹150.00 <del>₹220.00</del></h6>
                            </div>
                        </div>
                    </div>
                      <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product-sell-item">
                            <div class="product-image">
                               <img src="assets/img/product/5.png" alt="img">
                                <div class="cart-btn">
                                    <a href="{{url('/shop-cart')}}" class="theme-btn"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                </div>
                                <ul class="social-icon">
                                    <li>
                                        <a href="{{url('/product-details')}}"><i class="fa-regular fa-cart-shopping"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            <i class="fa-regular fa-eye"></i>
                                       </button>
                                    </li>
                                    <li>
                                        <a href="{{url('/product-details')}}"><i class="fa-regular fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="content">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-duotone fa-solid fa-star"></i>
                                    </div>
                                    <span>Eco-Friendly</span>
                                </div>
                                <h5>
                                    <a href="{{url('/product-details')}}">Reusable Canvas Bag</a>
                                </h5>
                                <h6>₹150.00 <del>₹220.00</del></h6>
                            </div>
                        </div>
                    </div>
                      <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product-sell-item">
                            <div class="product-image">
                               <img src="assets/img/product/7.png" alt="img">
                                <div class="cart-btn">
                                    <a href="{{url('/shop-cart')}}" class="theme-btn"><i class="fa-regular fa-cart-shopping"></i> Add To Cart</a>
                                </div>
                                <ul class="social-icon">
                                    <li>
                                        <a href="{{url('/product-details')}}"><i class="fa-regular fa-cart-shopping"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                            <i class="fa-regular fa-eye"></i>
                                       </button>
                                    </li>
                                    <li>
                                        <a href="{{url('/product-details')}}"><i class="fa-regular fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="content">
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-duotone fa-solid fa-star"></i>
                                    </div>
                                    <span>Eco-Friendly</span>
                                </div>
                                <h5>
                                    <a href="{{url('/product-details')}}">Reusable Canvas Bag</a>
                                </h5>
                                <h6>₹150.00 <del>₹220.00</del></h6>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
         </section>

         <!-- Testimonial-section Start -->
         <section class="testimonial-section section-padding section-bg fix">
            <div class="array-buttons">
                <button class="array-prev">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button class="array-next">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
            <div class="shape">
                <img src="assets/img/testimonial/circle.png" alt="img">
            </div>
            <div class="container">
                <div class="swiper testimonial-slider-2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-card-item">
                                <div class="testimonial-content">
                                    <h4>The Review Are In</h4>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-duotone fa-solid fa-star"></i>
                                    </div>
                                    <p>
                                        “ How you use the city or town name is up to you. All <br> results may be freely used in any work.”
                                    </p>
                                   <div class="info-item">
                                        <div class="client-image">
                                            <img src="assets/img/testimonial/client-3.png" alt="img">
                                        </div>
                                        <div class="text">
                                            <h6>Theodore Handle</h6>
                                            <span>CO Founder</span>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-card-item">
                                <div class="testimonial-content">
                                    <h4>The Review Are In</h4>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-duotone fa-solid fa-star"></i>
                                    </div>
                                    <p>
                                        “ How you use the city or town name is up to you. All <br> results may be freely used in any work.”
                                    </p>
                                   <div class="info-item">
                                        <div class="client-image">
                                            <img src="assets/img/testimonial/client-3.png" alt="img">
                                        </div>
                                        <div class="text">
                                            <h6>Theodore Handle</h6>
                                            <span>CO Founder</span>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-card-item">
                                <div class="testimonial-content">
                                    <h4>The Review Are In</h4>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-duotone fa-solid fa-star"></i>
                                    </div>
                                    <p>
                                        “ How you use the city or town name is up to you. All <br> results may be freely used in any work.”
                                    </p>
                                   <div class="info-item">
                                        <div class="client-image">
                                            <img src="assets/img/testimonial/client-3.png" alt="img">
                                        </div>
                                        <div class="text">
                                            <h6>Theodore Handle</h6>
                                            <span>CO Founder</span>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>

        <!-- News-section Start -->
        <section class="news-section fix section-padding">
            <div class="container">
                <div class="section-title-area">
                    <div class="section-title style-3">
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">
                            From The Blogs
                        </h2>
                        <p class="mt-3 wow fadeInUp" data-wow-delay=".5s">
                            Did we think we’d ever see the meme-like pointy-too sneaker ever go.
                        </p>
                    </div>
                    <div class="array-buttons-2 wow fadeInUp" data-wow-delay=".3s">
                        <button class="array-prev">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                        <button class="array-next">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <div class="swiper news-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="news-card-items-2">
                                <div class="news-image">
                                    <img src="assets/img/news/07.jpg" alt="img">
                                </div>
                                <div class="news-content">
                                    <ul class="post-meta"> 
                                        <li>
                                            January 28, 2025
                                        </li>
                                    </ul>
                                    <h3>
                                        <a href="news-details.html">In Difficult Times, Fashion is Always Outrageous.</a>
                                    </h3>
                                    <a href="news-details.html" class="link-btn">Read More <i class="fa-regular fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="news-card-items-2">
                                <div class="news-image">
                                    <img src="assets/img/news/08.jpg" alt="img">
                                </div>
                                <div class="news-content">
                                    <ul class="post-meta"> 
                                        <li>
                                            January 28, 2025
                                        </li>
                                    </ul>
                                    <h3>
                                        <a href="news-details.html">In Difficult Times, Fashion is Always Outrageous.</a>
                                    </h3>
                                    <a href="news-details.html" class="link-btn">Read More <i class="fa-regular fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="news-card-items-2">
                                <div class="news-image">
                                    <img src="assets/img/news/09.jpg" alt="img">
                                </div>
                                <div class="news-content">
                                    <ul class="post-meta"> 
                                        <li>
                                            January 28, 2025
                                        </li>
                                    </ul>
                                    <h3>
                                        <a href="news-details.html">In Difficult Times, Fashion is Always Outrageous.</a>
                                    </h3>
                                    <a href="news-details.html" class="link-btn">Read More <i class="fa-regular fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Instagram Banner Section Start -->
        <div class="instagram-banner fix">
        <div class="instagram-wrapper style-3">
            <div class="swiper instagram-banner-slider-2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="instagram-banner-items mt-0">
                            <div class="banner-image">
                                <img src="assets/img/instagram/13.jpg" alt="insta-img">
                                <a href="https://instagram.com/" class="icon">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="instagram-banner-items mt-0">
                            <div class="banner-image">
                                <img src="assets/img/instagram/14.jpg" alt="insta-img">
                                <a href="https://instagram.com/" class="icon">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="instagram-banner-items mt-0">
                            <div class="banner-image">
                                <img src="assets/img/instagram/15.jpg" alt="insta-img">
                                <a href="https://instagram.com/" class="icon">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="instagram-banner-items mt-0">
                            <div class="banner-image">
                                <img src="assets/img/instagram/16.jpg" alt="insta-img">
                                <a href="https://instagram.com/" class="icon">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="instagram-banner-items mt-0">
                            <div class="banner-image">
                                <img src="assets/img/instagram/17.jpg" alt="insta-img">
                                <a href="https://instagram.com/" class="icon">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

@include('includes.footer')
      