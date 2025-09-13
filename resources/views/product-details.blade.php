@include('includes.head')
@include('includes.header')
<!-- Shop Details Section Start -->
<section class="shop-details-section section-padding fix shop-bg">
   <div class="container">
      <div class="shop-details-wrapper">
         <div class="row g-4">
            <div class="col-lg-6">
               <div class="shop-details-image d-flex">
                  <!-- Left side thumbnails -->
                  <ul class="nav flex-column me-3 thumb-list">
                     <li class="nav-item mb-2">
                        <a href="#thumb1" data-bs-toggle="tab" class="nav-link active">
                        <img src="{{ $product->main_image ? asset('storage/' . $product->main_image) : asset('assets/img/product/9.png') }}" alt="img" class="zoom-image" >
                        </a>
                     </li>
                     <li class="nav-item mb-2">
                        <a href="#thumb2" data-bs-toggle="tab" class="nav-link">
                        <img src="{{ $product->image_1 ? asset('storage/' . $product->image_1) : asset('assets/img/product/9.png') }}" alt="img" class="zoom-image" >
                        </a>
                     </li>
                     <li class="nav-item mb-2">
                        <a href="#thumb3" data-bs-toggle="tab" class="nav-link">
                        <img src="{{ $product->image_2 ? asset('storage/' . $product->image_2) : asset('assets/img/product/9.png') }}" alt="img" class="zoom-image" >
                        </a>
                     </li>
                     <li class="nav-item mb-2">
                        <a href="#thumb4" data-bs-toggle="tab" class="nav-link">
                        <img src="{{ $product->image_3 ? asset('storage/' . $product->image_3) : asset('assets/img/product/9.png') }}" alt="img" class="zoom-image" >
                        </a>
                     </li>
                     <li class="nav-item mb-2">
                        <a href="#thumb5" data-bs-toggle="tab" class="nav-link">
                        <img src="{{ $product->image_4 ? asset('storage/' . $product->image_4) : asset('assets/img/product/9.png') }}" alt="img" class="zoom-image" >
                        </a>
                     </li>
                  </ul>
                  <!-- Right side main image -->
                  <div class="tab-content flex-grow-1">
                     <div id="thumb1" class="tab-pane fade show active">
                        <div class="shop-thumb">
                           <div class="shop-thumb zoom-container">
                              <img class="zoom-image" 
                                 src="{{ $product->main_image ? asset('storage/' . $product->main_image) : asset('assets/img/product/9.png') }}" 
                                 alt="img">
                           </div>
                        </div>
                     </div>
                     <div id="thumb2" class="tab-pane fade">
                        <div class="shop-thumb">
                           <div class="shop-thumb zoom-container">
                              <img class="zoom-image" src="{{ $product->image_1 ? asset('storage/' . $product->image_1) : asset('assets/img/product/9.png') }}" alt="img">
                           </div>
                        </div>
                     </div>
                     <div id="thumb3" class="tab-pane fade">
                        <div class="shop-thumb">
                           <div class="shop-thumb zoom-container">
                              <img class="zoom-image" src="{{ $product->image_2 ? asset('storage/' . $product->image_2) : asset('assets/img/product/9.png') }}" alt="img">
                           </div>
                        </div>
                     </div>
                     <div id="thumb4" class="tab-pane fade">
                        <div class="shop-thumb">
                           <div class="shop-thumb zoom-container">
                              <img class="zoom-image" src="{{ $product->image_3 ? asset('storage/' . $product->image_3) : asset('assets/img/product/9.png') }}" alt="img">
                           </div>
                        </div>
                     </div>
                     <div id="thumb5" class="tab-pane fade">
                        <div class="shop-thumb">
                           <div class="shop-thumb zoom-container">
                              <img class="zoom-image" src="{{ $product->image_4 ? asset('storage/' . $product->image_4) : asset('assets/img/product/9.png') }}" alt="img">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="product-details-content">
                  <h3 class="pb-3">{{ $product->title }}</h3>
                  <div class="star pb-3">
                     <a href="#"> <i class="fas fa-star"></i></a>
                     <a href="#"><i class="fas fa-star"></i></a>
                     <a href="#"> <i class="fas fa-star"></i></a>
                     <a href="#"><i class="fas fa-star"></i></a>
                     <a href="#"><i class="fas fa-star"></i></a>
                     <span>(25 Customer Review)</span>
                  </div>
                  <p class="mb-3 product_discription">
                     {{ $product->description }}
                  </p>
                  <div class="price-list">
                     @if($product->after_discount_price && $product->after_discount_price < $product->price)
                     <h3>
                        <del>₹{{ number_format($product->price, 2) }}</del> 
                        ₹{{ number_format($product->after_discount_price, 2) }}
                     </h3>
                     @else
                     <h3>₹{{ number_format($product->price, 2) }}</h3>
                     @endif
                  </div>
                  <div class="cart-wrp">
                     <div class="cart-quantity">
                        <button type="button" class="quantityDecrement btn-action" data-id="{{ $product->id }}" data-action="decrement">
                        <i class="fal fa-minus"></i>
                        </button>
                        <input type="text" class="quantityValue text-center" value="1" readonly style="width:40px;">
                        <button type="button" class="quantityIncrement btn-action" data-id="{{ $product->id }}" data-action="increment">
                        <i class="fal fa-plus"></i>
                        </button>
                     </div>
                     <a href="#" data-id="{{ $product->id }}" class="add-to-favorites-btn">
                     <i class="fa-regular fa-heart"></i>
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
                     <a href="#" data-url="{{ route('cart.add', $product->id) }}" class="theme-btn add-to-cart-btn">
                     <span>Add to cart</span>
                     </a>
                     <a href="{{url('/checkout')}}" class="theme-btn">
                     <span> Buy now</span>
                     </a>
                  </div>
                  <h6 class="details-info"><span>SKU:</span> <a href="{{url('/checkout')}}">124224</a></h6>
                  <h6 class="details-info"><span>Categories:</span> <a href="{{url('/checkout')}}">Crux Indoor Fast and Easy</a></h6>
                  <h6 class="details-info style-2"><span>Tags:</span> <a href="{{url('/checkout')}}"> <b>accessories</b> <b>business</b></a></h6>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Single-tab Section Start -->
<section class="single-tab-section section-padding fix pt-0">
   <div class="container">
      <div class="single-tab">
         <ul class="nav mb-5">
            <li class="nav-item">
               <a href="#description" data-bs-toggle="tab" class="nav-link ps-0 active">
                  <h6>Description</h6>
               </a>
            </li>
            <li class="nav-item">
               <a href="#additional" data-bs-toggle="tab" class="nav-link">
                  <h6>Additional Information  </h6>
               </a>
            </li>
            <li class="nav-item">
               <a href="#review" data-bs-toggle="tab" class="nav-link">
                  <h6>reviews (2)</h6>
               </a>
            </li>
         </ul>
         <div class="tab-content">
            <div id="description" class="tab-pane fade show active">
               <div class="description-items">
                  <div class="row">
                     <div class="col-xl-6 col-lg-6">
                        <div class="description-content">
                           <h3>Product descriptions</h3>
                           <p class="mb-4"> {{ $product->description }}</p>
                           <div class="description-list-items d-flex justify-content-between">
                              <ul class="description-list">
                                 <li>
                                    Product Name:- <span class="wrap-text">{{$product->title}}</span>
                                 </li>
                                 <li>
                                    SubCategory:- <span>{{$product->subcategory->name}}</span>
                                 </li>
                                 <li>
                                    Category:- <span>{{$product->category->name}}</span>
                                 </li>
                              </ul>
                              <ul class="description-list">
                                 <li>
                                    height:-  <span>{{$product->height}}</span>
                                 </li>
                                 <li>
                                    width:- <span>{{$product->width}}</span>
                                 </li>
                                 <li>
                                    Handle:- <span>{{$product->handle}}</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 mt-5 mt-lg-0">
                        <div class="description-image">
                           <img src="{{ $product->main_image ? asset('storage/' . $product->main_image) : asset('assets/img/product/9.png') }}" alt="{{ $product->title}}">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="additional" class="tab-pane fade">
               <div class="table-responsive">
                  <table class="table table-bordered">
                     <tbody>
                        <tr>
                           <td>height</td>
                           <td>{{$product->height}}</td>
                        </tr>
                        <tr>
                           <td>width</td>
                           <td>{{$product->width}}</td>
                        </tr>
                        <tr>
                           <td>Handle</td>
                           <td>{{$product->handle}}</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div id="review" class="tab-pane fade">
               <div class="review-items">
                  <div class="admin-items d-flex flex-wrap flex-md-nowrap align-items-center pb-4">
                     <div class="admin-img pb-4 pb-md-0 me-4">
                        <img src="assets/img/shop/01.jpg" alt="image">
                     </div>
                     <div class="content p-4">
                        <div class="head-content pb-1 d-flex flex-wrap justify-content-between">
                           <h5>miklos salsa<span>27June 2025 at 5.44pm</span></h5>
                           <div class="star">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                           </div>
                        </div>
                        <p>
                           Lorem ipsum dolor sit amet consectetur adipiscing elit. Curabitur vulputate vestibulum Phasellus rhoncus dolor eget viverra pretium.Curabitur vulputate vestibulum Phasellus rhoncus dolor eget viverra pretium.
                        </p>
                     </div>
                  </div>
                  <div class="admin-items d-flex flex-wrap flex-md-nowrap align-items-center pb-4">
                     <div class="admin-img pb-4 pb-md-0 me-4">
                        <img src="assets/img/shop/02.jpg" alt="image">
                     </div>
                     <div class="content p-4">
                        <div class="head-content pb-1 d-flex flex-wrap justify-content-between">
                           <h5>Ethan Turner <span>27June 2025 at 5.44pm</span></h5>
                           <div class="star">
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                              <i class="fas fa-star"></i>
                           </div>
                        </div>
                        <p>
                           Lorem ipsum dolor sit amet consectetur adipiscing elit. Curabitur vulputate vestibulum Phasellus rhoncus dolor eget viverra pretium.Curabitur vulputate vestibulum Phasellus rhoncus dolor eget viverra pretium.
                        </p>
                     </div>
                  </div>
                  <div class="review-title mt-5 py-15 mb-30">
                     <h4>add a review</h4>
                     <div class="rate-now d-flex align-items-center">
                        <p>Rate this product? *</p>
                        <div class="star">
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                        </div>
                     </div>
                  </div>
                  <div class="review-form">
                     <form action="#" id="contact-form2" method="POST">
                        <div class="row g-4">
                           <div class="col-lg-6">
                              <div class="form-clt">
                                 <input type="text" name="name" id="name" placeholder="Full Name">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-clt">
                                 <input type="text" name="email" id="email" placeholder="email addres">
                              </div>
                           </div>
                           <div class="col-lg-12 wow fadeInUp" data-wow-delay=".8">
                              <div class="form-clt-big form-clt">
                                 <textarea name="message" id="message" placeholder="message"></textarea> 
                              </div>
                           </div>
                           <div class="col-lg-6 wow fadeInUp" data-wow-delay=".9">
                              <button type="submit" class="theme-btn hover-color">
                              Post Submit
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Product-collection Section Start -->
{{-- 
<section class="product-collection-section-2 section-padding pt-0 fix">
   <div class="container">
      <div class="section-title style-2 text-center">
         <h6 class="sub-title wow fadeInUp">
            Next day Products
         </h6>
         <h2 class="wow fadeInUp" data-wow-delay=".3s">
            Related Products
         </h2>
      </div>
      <div class="tab-content">
         <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6">
               <div class="product-collection-item">
                  <div class="product-image">
                     <img src="assets/img/product/jute1.png" alt="img">
                     <div class="product-btn">
                        <a href="{{url('/shop-cart')}}" class="theme-btn-2 style-2">Add To Cart</a>
                     </div>
                  </div>
                  <div class="product-content">
                     <p>Physicians</p>
                     <h4>
                        <a href="{{url('/checkout')}}">Powder Creamy Natural</a>
                     </h4>
                     <ul class="doller">
                        <li>
                           $102.00 <del>$226.00</del>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
               <div class="product-collection-item">
                  <div class="product-image">
                     <img src="assets/img/product/2.png" alt="img">
                     <div class="badge">26%</div>
                     <div class="product-btn">
                        <a href="{{url('/shop-cart')}}" class="theme-btn-2 style-2">Add To Cart</a>
                     </div>
                  </div>
                  <div class="product-content">
                     <p>Mineral </p>
                     <h4>
                        <a href="{{url('/checkout')}}">Mineral Matte Finishing</a>
                     </h4>
                     <span>$16.00</span>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
               <div class="product-collection-item">
                  <div class="product-image">
                     <img src="assets/img/product/3.png" alt="img">
                     <div class="product-btn">
                        <a href="{{url('/shop-cart')}}" class="theme-btn-2 style-2">Add To Cart</a>
                     </div>
                  </div>
                  <div class="product-content">
                     <p>StriVectin</p>
                     <h4>
                        <a href="{{url('/checkout')}}">Resurfacing Exfoliating</a>
                     </h4>
                     <ul class="doller">
                        <li>
                           $76.00 <del>$106.00</del>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
               <div class="product-collection-item">
                  <div class="product-image">
                     <img src="assets/img/product/4.png" alt="img">
                     <div class="badge">35%</div>
                     <div class="product-btn">
                        <a href="{{url('/shop-cart')}}" class="theme-btn-2 style-2">Add To Cart</a>
                     </div>
                  </div>
                  <div class="product-content">
                     <p>Marcelle</p>
                     <h4>
                        <a href="{{url('/checkout')}}">Correction Tinted Cream</a>
                     </h4>
                     <span>$44.00</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
--}}
@include('includes.footer')