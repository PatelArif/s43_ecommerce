@extends('app')

@push('title')
    <title>Home | Step4Environment</title>
@endpush

@section('content')
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
    <div id="heroCarousel" class="carousel slide hero-slider" data-bs-ride="carousel">

        <!-- THUMBNAILS -->
        <div class="d-flex justify-content-center position-absolute w-100" style="bottom: 20px; z-index: 10; gap: 10px;">
            @foreach ($sliders as $index => $slider)
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                    class="border-0 p-0 {{ $index === 0 ? 'active' : '' }}">
                    @if ($slider->image)
                        <img src="{{ asset(config('constants.IMAGE_PATH') . $slider->image) }}" alt="{{ $slider->title }}"
                            style="width:60px; height:60px; object-fit:cover; border-radius:8px; border: 2px solid #fff;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </button>
            @endforeach
        </div>

        <!-- SLIDES -->
        <div class="carousel-inner">
            @foreach ($sliders as $index => $slider)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}"
                    style="background-image: url('{{ $slider->image ? asset(config('constants.IMAGE_PATH') . $slider->image) : '' }}');">
                    <div class="hero-overlay">
                        <div>
                            @if ($slider->sub_title)
                                <span class="badge bg-success mb-3">{{ $slider->sub_title }}</span>
                            @endif
                            <h1>{{ $slider->title }}</h1>
                            @if ($slider->description)
                                <div class="bg_text p-3 mb-3" style="display: inline-block;">
                                    <p>{{ $slider->description }}</p>

                                    @if ($slider->button_text && $slider->category)
                                        <div class="hero-buttons"><a
                                                href="{{ url('/allCategories/' . $slider->category->id) }}"
                                                class="btn btn-light">{{ $slider->button_text }}</a> <a
                                                href="{{ url('/allCategories/' . $slider->category->id) }}"
                                                class="btn btn-light">Explore</a> </div>
                                    @endif


                                    <div class="hero-features">
                                        <div><i class="bi bi-arrow-repeat"></i> 100% Recyclable</div>
                                        <div><i class="bi bi-heart"></i> Cruelty Free</div>
                                        <div><i class="bi bi-leaf"></i> Organic Certified</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<section class="py-5 pb-5  bg-light position-relative about1">
    <div class="container position-relative pb-5" style="z-index:1;">

        <div class="section-title text-center custm_css">
            <h2>Shop by Category</h2>
        </div>

        <div class="text-center mb-5  ">
            <h4 class="custm_cssh4">
               Discover our carefully curated eco-friendly products organized by category. Each product is selected for
                    its sustainability and quality.
            </h4>
        </div>

        {{-- AJAX wrapper --}}
        <div id="homeCategoryWrapper">
            @include('includes.home-category-list', ['categories' => $categories])
        </div>

    </div>
</section>

    <!-- Hero Section Start -->
    {{-- <section class="hero-section-3">

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
        </section> --}}
    <!-- Feature-Section Start -->
    {{-- <section class="feature-section fix">
                    <div class="container">
                        <div class="feature-wrapper">
                            <div class="feature-item style-2 wow fadeInUp" data-wow-delay=".2s">
                                <div class="icon">
                                    <img src="{{config('constants.ASSETS_PATH') }}img/icon/01.svg" alt="img">
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
                                    <img src="{{config('constants.ASSETS_PATH') }}img/icon/02.svg" alt="img">
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
                                    <img src="{{config('constants.ASSETS_PATH') }}img/icon/03.svg" alt="img">
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
                                    <img src="{{config('constants.ASSETS_PATH') }}img/icon/04.svg" alt="img">
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
    {{-- <section class="shop-bg-section fix">
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
        </section> --}}
    <!-- Product-store-section Start -->
    <section class="product-store-section section-padding fix no_pad">
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
                                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp"
                                        data-wow-delay="{{ $loop->index * 0.15 }}s">
                                        <div class="product-store-item">
                                            <div class="product-image">
                                                <img src="{{ $product->main_image ? asset(config('constants.IMAGE_PATH')  . $product->main_image) : asset('assets/img/generated images/bags2.png') }}"
                                                    alt="{{ $product->name }}"
                                                    onerror="this.onerror=null;this.src='{{ asset(config('constants.ASSETS_PATH').'img/product/9.png') }}';">
                                                <div class="sale-box">
                                                    @if ($product->discount > 0)
                                                        <div class="box">{{ $product->discount }}% off</div>
                                                    @endif
                                                </div>
                                                <div class="cart-btn">
                                                    <button type="button" class="theme-btn cart-action-btn"
                                                        data-id="{{ $product->id }}"
                                                        data-url="{{ route('cart.add', $product->id) }}">
                                                        <i class="fa-regular fa-cart-shopping"></i> Add To Cart
                                                    </button>
                                                </div>

                                                <ul class="social-icon">
                                                    <li>
                                                        <a href="{{ url('product-details/' . $product->id) }}">
                                                            <i class="fa-regular fa-cart-shopping"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('product-details/' . $product->id) }}"
                                                            class="view-product-btn">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="add-to-favorites-btn"
                                                            data-id="{{ $product->id }}">
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
                                                    <a href="{{ url('product-details/' . $product->id) }}">
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
                                <div class="col-12 text-center p-5 bg-secondary wow fadeIn" data-wow-delay=".3s"
                                    style="border-radius: 20px;">
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
    <section class="py-5 bg-light position-relative about2">
        <div class="container position-relative" style="z-index:1;">
            <div class="section-title-area">
                <div class="section-title">
                    <h6 class="sub-title wow fadeInUp" data-wow-delay=".1s">
                        <strong>Handpicked for You</strong>
                    </h6>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        Latest Collections
                    </h2>
                </div>
                <a href="{{ url('/allCategories') }}" class="theme-btn theme-btn-2 wow fadeInUp" data-wow-delay=".5s">
                    View More Items
                </a>
            </div>

            <div class="shop-discover-wrapper">
                <div class="row g-5">
                    <!-- Left Slider -->
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".4s">
                        <div class="swiper discover-slider">
                            <div class="swiper-wrapper">
                                @foreach ($latestProducts as $product)
                                    <div class="swiper-slide">
                                        <div class="shop-discover-item wow fadeInUp"
                                            data-wow-delay="{{ $loop->index * 0.2 }}s">
                                            <div class="shop-image">
                                                <img src="{{ $product->main_image ? asset(config('constants.IMAGE_PATH')  . $product->main_image) : asset(config('constants.ASSETS_PATH').'img/product/9.png') }}"
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
                                                    <a href="{{ url('product-details/' . $product->id) }}">
                                                        {{ $product->title }}
                                                    </a>
                                                </h4>
                                                <h6>
                                                    ₹{{ $product->after_discount_price ?? $product->price }}
                                                    @if (!empty($product->discount) && $product->discount > 0)
                                                        <del>₹{{ $product->price }}</del>
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-dot-5 wow fadeInUp" data-wow-delay=".6s">
                            <div class="dot-5"></div>
                        </div>
                    </div>

                    <!-- Right Banner -->
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay=".6s">
                        @php
                            $bannerProduct = $latestProducts->first();
                        @endphp

                        @if ($bannerProduct)
                            <div class="bg-image-2 bg-cover"
                                style="background-image: url('{{ $bannerProduct->main_image ? asset(config('constants.IMAGE_PATH')  . $bannerProduct->main_image) : asset('assets/img/product/1.png') }}');">
                                <div class="content wow fadeInUp" data-wow-delay=".8s">
                                    <h3>
                                        <a href="{{ url('product-details/' . $bannerProduct->id) }}">
                                            {{ $bannerProduct->title }}
                                        </a>
                                    </h3>
                                    <a href="{{ url('product-details/' . $bannerProduct->id) }}" class="theme-btn">
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
    <section class="product-sell-section section-padding fix custom-container-4 pt-5">
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
                                <a href="{{ url('product-details/' . $product->id) }}">
                                    <img src="{{ $product->main_image ? asset(config('constants.IMAGE_PATH')  . $product->main_image) : asset('assets/img/generated images/bags2.png') }}"
                                        alt="{{ $product->title }}">
                                </a>
                                <div class="cart-btn">
                                    <a href="{{ url('/shop-cart') }}" class="theme-btn">
                                        <i class="fa-regular fa-cart-shopping"></i> Add To Cart
                                    </a>
                                </div>
                                <ul class="social-icon">
                                    <li>
                                        <a href="{{ url('product-details/' . $product->id) }}">
                                            <i class="fa-regular fa-cart-shopping"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('product-details/' . $product->id) }}" class="view-product-btn">
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
                                    <a href="{{ url('product-details/' . $product->id) }}">{{ $product->title }}</a>
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
            <img src="{{config('constants.ASSETS_PATH') }}img/testimonial/circle.png" alt="img">
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
                                        <img src="{{config('constants.ASSETS_PATH') }}img/testimonial/client-3.png" alt="Eco-friendly bag">
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
                                        <img src="{{config('constants.ASSETS_PATH') }}img/testimonial/client-2.png" alt="Eco-friendly customer">
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
                                        <img src="{{config('constants.ASSETS_PATH') }}img/testimonial/client-1.png" alt="Eco bag user">
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
    <!-- Instagram Banner Section Start -->
    <div class="instagram-banner fix">
        <div class="instagram-wrapper style-3">
            <div class="swiper instagram-banner-slider-2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="instagram-banner-items mt-0">
                            <div class="banner-image">
                                <img src="{{config('constants.ASSETS_PATH') }}img/product/6.png" alt="insta-img">
                                <a href="{{ url('/allCategories') }}" class="icon">
                                    <i class="fa fa-shopping-bag"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="instagram-banner-items mt-0">
                            <div class="banner-image">
                                <img src="{{config('constants.ASSETS_PATH') }}img/product/2.png" alt="insta-img">
                                <a href="{{ url('/allCategories') }}" class="icon">
                                    <i class="fa fa-shopping-bag"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="instagram-banner-items mt-0">
                            <div class="banner-image">
                                <img src="{{config('constants.ASSETS_PATH') }}img/product/3.png" alt="insta-img">
                                <a href="{{ url('/allCategories') }}" class="icon">
                                    <i class="fa fa-shopping-bag"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="instagram-banner-items mt-0">
                            <div class="banner-image">
                                <img src="{{config('constants.ASSETS_PATH') }}img/product/4.png" alt="insta-img">
                                <a href="{{ url('/allCategories') }}" class="icon">
                                    <i class="fa fa-shopping-bag"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="instagram-banner-items mt-0">
                            <div class="banner-image">
                                <img src="{{config('constants.ASSETS_PATH') }}img/product/9.png" alt="insta-img">
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
@endsection
