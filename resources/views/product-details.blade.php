@include('includes.head')
@include('includes.header')
         <!-- Shop Details Section Start -->
        <section class="shop-details-section section-padding fix shop-bg">
            <div class="container">
            <div class="shop-details-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="shop-details-image">
                        <div class="tab-content">
                            <div id="thumb1" class="tab-pane fade show active">
                                <div class="shop-thumb">
                                    <img src="assets/img/shop/details-2.jpg" alt="img">
                                </div>
                            </div>
                            <div id="thumb2" class="tab-pane fade">
                                <div class="shop-thumb">
                                    <img src="assets/img/shop/details-5.jpg" alt="img">
                                </div>
                            </div>
                            <div id="thumb3" class="tab-pane fade">
                                <div class="shop-thumb">
                                    <img src="assets/img/shop/details-6.jpg" alt="img">
                                </div>
                            </div>
                            <div id="thumb4" class="tab-pane fade">
                                <div class="shop-thumb">
                                    <img src="assets/img/shop/details-7.jpg" alt="img">
                                </div>
                            </div>
                            <div id="thumb5" class="tab-pane fade">
                                <div class="shop-thumb">
                                    <img src="assets/img/shop/details-8.jpg" alt="img">
                                </div>
                            </div>
                            </div>
                            <ul class="nav">
                            <li class="nav-item">
                                <a href="#thumb1" data-bs-toggle="tab" class="nav-link ps-0 active">
                                <img src="assets/img/shop/small-1.jpg" alt="img">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#thumb2" data-bs-toggle="tab" class="nav-link">
                                    <img src="assets/img/shop/small-2.jpg" alt="img">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#thumb3" data-bs-toggle="tab" class="nav-link">
                                    <img src="assets/img/shop/small-3.jpg" alt="img">
                                </a>
                            </li>
                            <li class="nav-item">
                            <a href="#thumb4" data-bs-toggle="tab" class="nav-link">
                                <img src="assets/img/shop/small-4.jpg" alt="img">
                            </a>
                            </li>
                            <li class="nav-item">
                                <a href="#thumb5" data-bs-toggle="tab" class="nav-link">
                                    <img src="assets/img/shop/small-5.jpg" alt="img">
                                </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details-content">
                            <h3 class="pb-3">{{$id}}</h3>
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
                                <a href="{{url('/checkout')}}" class="icon">
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
                                <a href="{{url('/shop-cart')}}" class="theme-btn">
                                    <span> Add to cart</span>
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
                                      <p class="mb-4">
                                         Creating handcrafted paintings involves a wide range of techniques, styles, and materials, so product details can vary significantly depending on the specific artwork and artist. However, here are some common product details that you might find when purchasing or describing a handcrafted painting:
                                      </p>
                                      <p>
                                         When purchasing or selling a handcrafted painting, it's essential to have a clear understanding of these product details to make an informed decision and to provide potential buyers with a comprehensive description of the artwork. Additionally, the value and significance of a handcrafted painting can be influenced by factors like the artist's reputation, the rarity of the piece, and the demand for their work in the
                                         art market.
                                      </p>
                                      <div class="description-list-items d-flex justify-content-between">
                                         <ul class="description-list">
                                            <li>
                                               Model wears:
                                               <span>UK 10/ EU 38/ US 6</span>
                                            </li>
                                            <li>
                                               Occasion:
                                               <span> Lifestyle, Sport</span>
                                            </li>
                                            <li>
                                               Country:
                                               <span>Italy</span>
                                            </li>
                                         </ul>
                                         <ul class="description-list">
                                            <li>
                                               Model wears:
                                               <span>UK 10/ EU 38/ US 6</span>
                                            </li>
                                            <li>
                                               Occasion:
                                               <span> Lifestyle, Sport</span>
                                            </li>
                                            <li>
                                               Country:
                                               <span>Italy</span>
                                            </li>
                                         </ul>
                                      </div>
                                   </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 mt-5 mt-lg-0">
                                   <div class="description-image">
                                      <img src="assets/img/product/jute.png" alt="img">
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
                                     <td>Weight</td>
                                     <td>240 Ton</td>
                                   </tr>
                                   <tr>
                                     <td>Dimensions</td>
                                     <td>20 × 30 × 40 cm</td>
                                   </tr>
                                   <tr>
                                     <td>Colors</td>
                                     <td>Black, Blue, Green</td>
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

 @include('includes.footer')
