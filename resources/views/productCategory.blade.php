@push('title')
<title>{{$category->name}}</title>
@endpush
@include('includes.head')
@include('includes.header')
      

        <!-- product-details-Section Start -->
        <section class="product-details-section section-padding fix">
            <div class="container">
                <div class="product-details-wrapper">
                    <div class="top-content">
                        <h2>{{$category->name}}
                           
                        </h2>
                        <ul class="list">
                            <li>Home</li>
                            <li>
                                {{$category->name}}
                            </li>
                        </ul>
                    </div>  
                    <div class="tab-content">
                    <div id="Course" class="tab-pane fade show active">
    <div class="row">
        @foreach ($category->subcategories as $subcategory)
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="product-details-item">
                    <div class="shop-image">
                        <img src="{{ asset('storage/' . $subcategory->image) }}" alt="{{ $subcategory->name }}">
                        <ul class="shop-icon d-grid justify-content-center align-items-center">
                            <li>
                                <a href="{{ url('/allCategories/' . $category->slug . '/' . $subcategory->slug) }}">
                                    <i class="fa-regular fa-cart-shopping"></i>
                                </a>
                            </li>
                            <li>
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </li>
                            <li>
                                <a href="shop-cart.html"><i class="far fa-heart"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="content">
                        <p>{{ $category->name }}</p>
                        <h4>
                            <a href="{{ url('/allCategories/' . $category->id . '/' . $subcategory->id) }}">
                                 {{ $subcategory->name }}
                            </a>
                        </h4>
                        <div class="star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h6>$76.00 <del>$99.00</del></h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

                    </div>
                  
                </div>
            </div>
        </section>

        @include('includes.footer')