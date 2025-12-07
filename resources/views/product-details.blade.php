@include('includes.head')
@include('includes.header')
<style>
    .header-1 {
        background: transparent;
    }

    .sticky {
        position: fixed !important;
        background: linear-gradient(90deg, #145A32, #26aa5f);
    }
</style>

<!-- Contact / Product Title Section -->
<section class="contact-us-section bg-custm contact-padding fix position-relative">
    <!-- Particles background -->
    <div id="particles-js" class="particles"></div>
    <div class="container-fluid">
        <div class="conatct-main-wrapper">
            <div class="content p-5">
                <h2>{{ $product->title }}</h2>
            </div>
        </div>
    </div>
</section>

<!-- Shop Details Section -->
<section class="shop-details-section section-padding fix shop-bg">
    <div class="container">
        <div class="shop-details-wrapper">
            <div class="row g-4">

                <!-- Left Column: Images -->
                <div class="col-lg-6">
                    <div class="shop-details-image d-flex">
                        <!-- Thumbnails -->
                        <ul class="nav flex-column me-3 thumb-list">
                            @foreach (['main_image', 'image_1', 'image_2', 'image_3', 'image_4'] as $index => $img)
                                <li class="nav-item mb-2">
                                    <a href="#thumb{{ $index + 1 }}" data-bs-toggle="tab"
                                        class="nav-link {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ $product->$img ? asset('storage/' . $product->$img) : asset('assets/img/product/9.png') }}"
                                            alt="thumbnail" class="zoom-image thumb-img">
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Main Images -->
                        <div class="tab-content flex-grow-1">
                            @foreach (['main_image', 'image_1', 'image_2', 'image_3', 'image_4'] as $index => $img)
                                <div id="thumb{{ $index + 1 }}"
                                    class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}">
                                    <div class="shop-thumb zoom-container">
                                        <img class="zoom-image main-img"
                                            src="{{ $product->$img ? asset('storage/' . $product->$img) : asset('assets/img/product/9.png') }}"
                                            alt="product image">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Column: Product Details -->
                <div class="col-lg-6">
                    <div class="product-details-content">
                        <h3 class="pb-3">{{ $product->title }}</h3>

                        <!-- Rating -->
                        <div class="star pb-3">
                            @for ($i = 0; $i < 5; $i++)
                                <a href="#"><i class="fas fa-star"></i></a>
                            @endfor
                            <span>(25 Customer Review)</span>
                        </div>

                        <!-- Description -->
                        <p class="mb-3 product_discription">{{ $product->description }}</p>

                        <!-- Price -->
                        <div class="price-list">
                            @if ($product->after_discount_price && $product->after_discount_price < $product->price)
                                <h3>
                                    <del>₹{{ number_format($product->price, 2) }}</del>
                                    ₹{{ number_format($product->after_discount_price, 2) }}
                                </h3>
                            @else
                                <h3>₹{{ number_format($product->price, 2) }}</h3>
                            @endif
                        </div>

                        <!-- Quantity & Wishlist -->
                        <div class="cart-wrp d-flex align-items-center">
                            <div class="cart-quantity me-3">
                                <button type="button" class="quantityDecrement btn-action"
                                    data-id="{{ $product->id }}">
                                    <i class="fal fa-minus"></i>
                                </button>
                                <input type="text" class="cart-quantity-input quantityValue text-center"
                                    data-product-id="{{ $product->id }}" value="1" readonly style="width:40px;">
                                <button type="button" class="quantityIncrement btn-action"
                                    data-id="{{ $product->id }}">
                                    <i class="fal fa-plus"></i>
                                </button>
                            </div>
                            <a href="#" data-id="{{ $product->id }}" class="add-to-favorites-btn me-3">
                                <i class="fa-regular fa-heart"></i>
                            </a>

                            <!-- Social -->
                            <div class="social-profile">
                                <span class="plus-btn"><i class="far fa-share"></i></span>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <button type="button" class="theme-btn cart-action-btn" data-id="{{ $product->id }}"
                            data-url="{{ route('cart.add', $product->id) }}">
                            <i class="fa-regular fa-cart-shopping"></i> Add To Cart
                        </button>

                        <!-- Meta Info -->
                        <h6 class="details-info mt-3"><span>SKU:</span> <a href="{{ url('/checkout') }}">124224</a>
                        </h6>
                        <h6 class="details-info"><span>Categories:</span> <a href="{{ url('/checkout') }}">Crux Indoor
                                Fast and Easy</a></h6>
                        <h6 class="details-info style-2"><span>Tags:</span>
                            <a href="{{ url('/checkout') }}">
                                <b>accessories</b> <b>business</b>
                            </a>
                        </h6>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Single Tab Section (Description / Additional Info / Reviews) -->
<section class="single-tab-section section-padding fix pt-0">
    <div class="container">
        <div class="single-tab">
            <ul class="nav mb-5">
                <li class="nav-item"><a href="#description" data-bs-toggle="tab" class="nav-link ps-0 active">
                        <h6>Description</h6>
                    </a></li>
                <li class="nav-item"><a href="#additional" data-bs-toggle="tab" class="nav-link">
                        <h6>Additional Information</h6>
                    </a></li>
                <li class="nav-item"><a href="#review" data-bs-toggle="tab" class="nav-link">
                        <h6>Reviews (2)</h6>
                    </a></li>
            </ul>
            <div class="tab-content">
                <!-- Description -->
                <div id="description" class="tab-pane fade show active">
                    <div class="description-items">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="description-content">
                                    <h3>Product Description</h3>
                                    <p>{{ $product->description }}</p>
                                    <div class="description-list-items d-flex justify-content-between">
                                        <ul class="description-list">
                                            <li>Product Name: <span>{{ $product->title }}</span></li>
                                            <li>SubCategory: <span>{{ $product->subcategory->name }}</span></li>
                                            <li>Category: <span>{{ $product->category->name }}</span></li>
                                        </ul>
                                        <ul class="description-list">
                                            <li>Height: <span>{{ $product->height }}</span></li>
                                            <li>Width: <span>{{ $product->width }}</span></li>
                                            <li>Handle: <span>{{ $product->handle }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-5 mt-lg-0">
                                <div class="description-image">
                                    <img src="{{ $product->main_image ? asset('storage/' . $product->main_image) : asset('assets/img/product/9.png') }}"
                                        class="img-fluid" alt="{{ $product->title }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Info -->
                <div id="additional" class="tab-pane fade">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Height</td>
                                    <td>{{ $product->height }}</td>
                                </tr>
                                <tr>
                                    <td>Width</td>
                                    <td>{{ $product->width }}</td>
                                </tr>
                                <tr>
                                    <td>Handle</td>
                                    <td>{{ $product->handle }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Reviews -->
                <div id="review" class="tab-pane fade">
                    <!-- Example Review -->
                    <div class="admin-items d-flex flex-wrap flex-md-nowrap align-items-center pb-4">
                        <div class="admin-img me-4"><img src="{{config('constants.ASSETS_PATH') }}img/shop/01.jpg" alt="image"></div>
                        <div class="content p-4">
                            <div class="head-content pb-1 d-flex justify-content-between">
                                <h5>Miklos Salsa <span>27 June 2025 at 5:44pm</span></h5>
                                <div class="star">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Curabitur vulputate vestibulum...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('includes.footer')

<!-- Custom CSS -->
<style>
    /* Main product images */
    .zoom-container {
        width: 100%;
        max-height: 500px;
        overflow: hidden;
    }

    .zoom-image.main-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
    }

    /* Thumbnails */
    .thumb-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        cursor: pointer;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    /* Quantity buttons */
    .cart-quantity button {
        width: 30px;
        height: 30px;
        border-radius: 4px;
    }
</style>
