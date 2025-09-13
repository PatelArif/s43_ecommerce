@push('title')
<title>All Caregories</title>
@endpush
@include('includes.head')
@include('includes.header')
    <section class="contact-us-section bg-custm contact-padding fix position-relative">
    <!-- Particles background -->
    <div id="particles-js" class="particles"></div>

            <div class="container-fluid">
                <div class="conatct-main-wrapper">
                    <div class="content p-5">
                        <h2> All Categories</h2>
                      
                    </div>
                    </div>

                    </div>
     </section>
         <!-- Shop-categories-Section Start -->
        <div class="shop-categories-section section-padding pt-0">
            <div class="container">
                <div class="shop-categories-wrapper">
                
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
                                <p>{{ $category->subcategories_count ?? '0' }} Categories</p>
                                <a href="{{ url('/allCategories/' . $category->id) }}" class="link-btns">
                                    Shop Now <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach                     
                </div>
                </div>
            </div>
        </div>

    


@include('includes.footer')
