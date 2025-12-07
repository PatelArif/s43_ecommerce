@extends('app')

@push('title')
    <title>All Categories| Step4Environment</title>
@endpush

@section('content')
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
  <div class="shop-categories-section section-padding pt-5">
    <div class="container">
        <div class="shop-categories-wrapper">
            <div class="row g-4">
                @foreach($categories as $category)
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="category-card shadow-sm rounded-3 overflow-hidden h-100 d-flex flex-column">
                            
                            <!-- Image -->
                            <div class="category-image">
                                <img src="{{ asset('storage/' . $category->image) }}" 
                                     alt="{{ $category->name }}" 
                                     class="img-fluid w-100 fixed-img">
                                <div class="overlay d-flex justify-content-center align-items-center">
                                    <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                                    <a href="#" class="icon-btn"><i class="fa-regular fa-cart-shopping"></i></a>
                                    <button class="icon-btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="content p-4 d-flex flex-column flex-grow-1 text-center">
                                <h4 class="fw-bold mb-2">
                                    <a href="{{ url('/allCategories/' . $category->id) }}" class="category-title">
                                        {{ $category->name }}
                                    </a>
                                </h4>
                                <p class="text-muted mb-3">
                                    {{ $category->subcategories_count ?? '0' }} Sub Categories
                                </p>

                                <!-- Push button to bottom -->
                                <div class="mt-auto">
                                    <a href="{{ url('/allCategories/' . $category->id) }}" 
                                       class="btn btn-outline-success btn-sm rounded-pill w-100">
                                        Shop Now <i class="fa-solid fa-chevron-right ms-2"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach                     
            </div>
        </div>
    </div>
</div>
@endsection