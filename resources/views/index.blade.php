@push('title')
    <title>Home</title>
@endpush
@include('includes.head')
@include('includes.header')
<style>
    .section-padding {
        padding: 50px 0;
    }
</style>
<!-- Modal Version 2 -->
@include('includes.productView')
<!-- Toast Container -->
<div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 1055;">
    <div id="cart-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Cart</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Product added to cart!
        </div>
    </div>
</div>


<!-- Hero Section Start -->
<section class="hero-section-3">

    <div class="swiper hero-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="hero-3">
                    <div class="hero-bg bg-cover" style="background-image: url(assets/img/hero/s43.webp);">
                    </div>
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-10">
                                <div class="hero-content">

                                    <h1 class="">
                                        Eco Friendly and <br> Sustainable Bags
                                    </h1>
                                    <div class="hero-button">
                                        <a href="{{ url('/product-details') }}" class="theme-btn">Shop Now <i
                                                class="fa-regular fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="hero-3">
                    <div class="hero-bg bg-cover" style="background-image: url(assets/img/hero/Step4Environment.png);">
                    </div>
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-10">
                                <div class="hero-content">

                                    <h1 class="">
                                        Eco Friendly and <br> Sustainable Bags
                                    </h1>
                                    <div class="hero-button">
                                        <a href="{{ url('/product-details') }}" class="theme-btn">Shop Now <i
                                                class="fa-regular fa-arrow-right"></i></a>
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
{{-- <section class="feature-section fix">
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
         </section> --}}

<!-- Shop-bg-section Start -->
<section class="shop-bg-section fix">
    <div class="row g-4">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
            <div class="bg-image bg-cover" style="background-image: url(assets/img/hero/multipurpose.png);">
                <div class="content">
                    <h3>
                        <a href="{{ url('category/multiPurposeBags/1') }}">multipurpose Reusable bags</a>
                    </h3>
                    <p class="text-black">2025 Collection</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="bg-image style-2 bg-cover" style="background-image: url(assets/img/hero/jute.png);">
                <div class="content text-white">
                    <h3>
                        <a class="text-white"href="{{ url('shop-grid') }}">Tote Bags , Reusable Canvas Bags</a>
                    </h3>
                    <p class="text-white">2025 Collection</p>
                </div>
            </div>
            <div class="bg-image mt-20 style-2 bg-cover" style="background-image: url(assets/img/hero/jute1.png);">
                <div class="content">
                    <h3>
                        <a href="{{ url('shop-grid') }}">Jute Bags </a>
                    </h3>
                    <p class="text-black">2025 Collection</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product-store-section Start -->
<section class="product-store-section section-padding fix">
   <div class="container">
      <div class="section-title text-center">
         <h2 class="wow fadeInUp" data-wow-delay=".3s">
            Our Product In Store
         </h2>
      </div>
      <div class="product-wrapper">
         <div class="tab-content">
            <div id="Course" class="tab-pane fade show active">
               <div class="row">
                  @if ($products->count() > 0)
                     @foreach ($products as $product)
                     <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product-store-item">
                           <div class="product-image">
                              <img src="{{ $product->main_image ? asset('storage/' . $product->main_image) : asset('assets/img/product/9.png') }}"
                                 alt="{{ $product->name }}"
                                 onerror="this.onerror=null;this.src='{{ asset('assets/img/product/9.png') }}';">
                              <div class="sale-box">
                                 @if ($product->discount > 0)
                                 <div class="box">{{ $product->discount }}% off</div>
                                 @endif
                              </div>
                              <div class="cart-btn">
                                 <button type="button" 
                                    class="theme-btn add-to-cart-btn" 
                                    data-id="{{ $product->id }}" 
                                    data-url="{{ route('cart.add', $product->id) }}">
                                 <i class="fa-regular fa-cart-shopping"></i> Add To Cart
                                 </button>
                              </div>
                              <ul class="social-icon">
                                 <li>
                                    <a href="{{ url('product-details/'.$product->id) }}">
                                    <i class="fa-regular fa-cart-shopping"></i>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="{{ url('product-details/'.$product->id) }}" class="view-product-btn">
                                    <i class="fa-regular fa-eye"></i>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="add-to-favorites-btn" data-id="{{ $product->id }}">
                                    <i class="fa-regular fa-heart"></i>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                           <div class="product-content">
                              <div class="content">
                                 <span>{{ $product->category->name ?? 'Eco-Friendly' }}</span>
                                 <div class="star">
                                    @for ($i = 0; $i < 5; $i++)
                                    <i class="fa-solid fa-star"></i>
                                    @endfor
                                 </div>
                              </div>
                              <h5>
                                 <a href="{{ url('product-details/'.$product->id) }}">
                                 {{ $product->title }}
                                 </a>
                              </h5>
                              <h6>
                                 @if (!empty($product->discount) && $product->discount > 0)
                                 ₹{{ $product->after_discount_price }}
                                 <del>₹{{ $product->price }}</del>
                                 @else
                                 ₹{{ $product->price }}
                                 @endif
                              </h6>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  @else
                     <div class="col-12 text-center p-5 bg-secondary">
                        <h2 class="no-products-message text-white">No products available at the moment. </h2>
                     </div>
                  @endif
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
                    <strong>Handpicked for You</strong>
                </h6>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                   Latest Collections
                </h2>
            </div>
            <a href="{{ url('/allCategories/' . $product->category->id . '/' . $product->subcategory->id) }}" class="theme-btn theme-btn-2 wow fadeInUp" data-wow-delay=".5s">
                View More Items
            </a>
        </div>

        <div class="shop-discover-wrapper">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="swiper discover-slider">
                        <div class="swiper-wrapper">
                            @foreach ($latestProducts as $product)
                                <div class="swiper-slide">
                                    <div class="shop-discover-item">
                                        <div class="shop-image">
                                            <img src="{{ $product->main_image ? asset('storage/' . $product->main_image) : asset('assets/img/product/9.png') }}"
                                                 alt="{{ $product->title }}">
                                        </div>
                                        <div class="content">
                                            <div class="star">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <i class="fa-solid fa-star"></i>
                                                @endfor
                                            </div>
                                            <p>{{ $product->category->name ?? 'Eco-Friendly' }}</p>
                                            <h4>
                                                <a href="{{ url('product-details/'.$product->id) }}">
                                                    {{ $product->title }}
                                                </a>
                                            </h4>
                                            <h6>
                                                ₹{{ $product->after_discount_price ?? $product->price }}
                                                @if(!empty($product->discount) && $product->discount > 0)
                                                    <del>₹{{ $product->price }}</del>
                                                @endif
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-dot-5">
                        <div class="dot-5"></div>
                    </div>
                </div>

                <!-- Right Banner -->
                <div class="col-lg-6">
    @php 
        $bannerProduct = $latestProducts->first();
    @endphp

    @if($bannerProduct)
        <div class="bg-image-2 bg-cover" 
             style="background-image: url('{{ $bannerProduct->main_image ? asset('storage/' . $bannerProduct->main_image) : asset('assets/img/product/1.png') }}');">
            <div class="content">
                <h3>
                    <a href="{{ url('product-details/'.$bannerProduct->id) }}">
                        {{ $bannerProduct->title }}
                    </a>
                </h3>
                <a href="{{ url('product-details/'.$bannerProduct->id) }}" class="theme-btn">
                    Explore More <i class="fa-regular fa-arrow-right"></i>
                </a>
            </div>
        </div>
    @endif
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
               Top Deals of the Week
            </h6>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
               Hot-Selling Discounts
            </h2>
        </div>
        <div class="row">
            @forelse($discountProducts as $product)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-sell-item">
                        <div class="product-image">
                            <img src="{{ $product->main_image ? asset('storage/' . $product->main_image) : asset('assets/img/product/placeholder.png') }}" alt="{{ $product->title }}">
                            <div class="cart-btn">
                                <a href="{{ url('/shop-cart') }}" class="theme-btn">
                                    <i class="fa-regular fa-cart-shopping"></i> Add To Cart
                                </a>
                            </div>
                            <ul class="social-icon">
                                <li>
                                    <a href="{{ route('productDetails', $product->id) }}">
                                        <i class="fa-regular fa-cart-shopping"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('product-details/'.$product->id) }}" class="view-product-btn">
                                    <i class="fa-regular fa-eye"></i>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="add-to-favorites-btn" data-id="{{ $product->id }}">
                                    <i class="fa-regular fa-heart"></i>
                                    </a>
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
                                <span>{{ $product->category->name ?? 'Eco-Friendly' }}</span>
                            </div>
                            <h5>
                                <a href="{{ route('productDetails', $product->id) }}">{{ $product->title }}</a>
                            </h5>
                            <h6>
                                ₹{{ $product->after_discount_price }}
                                <del>₹{{ $product->price }}</del>
                            </h6>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No discounted products available.</p>
            @endforelse
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
                            <h4>Eco-Friendly Choices</h4>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p>
                                “ Step4Environment’s eco-friendly bags are durable, stylish, and reusable. <br>
                                A perfect replacement for single-use plastics. ”
                            </p>
                            <div class="info-item">
                                <div class="client-image">
                                    <img src="assets/img/testimonial/client-3.png" alt="Eco-friendly bag">
                                </div>
                                <div class="text">
                                    <h6>Smita More</h6>
                                    <span>Founder, Step4Environment</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="testimonial-card-item">
                        <div class="testimonial-content">
                            <h4>Sustainable Living</h4>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p>
                                “ I love Step4Environment bags! They’re strong, eco-friendly, <br>
                                and help me reduce my carbon footprint every day. ”
                            </p>
                            <div class="info-item">
                                <div class="client-image">
                                    <img src="assets/img/testimonial/client-2.png" alt="Eco-friendly customer">
                                </div>
                                <div class="text">
                                    <h6>Priya Sharma</h6>
                                    <span>Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="testimonial-card-item">
                        <div class="testimonial-content">
                            <h4>Step Towards Green</h4>
                            <div class="star">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p>
                                “ Switching to Step4Environment eco-friendly bags was the best decision. <br>
                                Affordable, reusable, and planet-friendly. ”
                            </p>
                            <div class="info-item">
                                <div class="client-image">
                                    <img src="assets/img/testimonial/client-1.png" alt="Eco bag user">
                                </div>
                                <div class="text">
                                    <h6>Rahul Verma</h6>
                                    <span>Environmentalist</span>
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


<!-- Instagram Banner Section Start -->
<div class="instagram-banner fix">
    <div class="instagram-wrapper style-3">
        <div class="swiper instagram-banner-slider-2">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="instagram-banner-items mt-0">
                        <div class="banner-image">
                            <img src="assets/img/product/6.png" alt="insta-img">
                            <a href="{{ url('/allCategories') }}" class="icon">
                                <i class="fa fa-shopping-bag"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="instagram-banner-items mt-0">
                        <div class="banner-image">
                            <img src="assets/img/product/2.png" alt="insta-img">
                            <a href="{{ url('/allCategories') }}" class="icon">
                                <i class="fa fa-shopping-bag"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="instagram-banner-items mt-0">
                        <div class="banner-image">
                            <img src="assets/img/product/3.png" alt="insta-img">
                            <a href="{{ url('/allCategories') }}" class="icon">
                                <i class="fa fa-shopping-bag"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="instagram-banner-items mt-0">
                        <div class="banner-image">
                            <img src="assets/img/product/4.png" alt="insta-img">
                            <a href="{{ url('/allCategories') }}" class="icon">
                                <i class="fa fa-shopping-bag"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="instagram-banner-items mt-0">
                        <div class="banner-image">
                            <img src="assets/img/product/9.png" alt="insta-img">
                            <a href="{{ url('/allCategories') }}" class="icon">
                                <i class="fa fa-shopping-bag"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes.footer')
