@push('title')
<title>{{ $category->name }}</title>
@endpush
@include('includes.head')
@include('includes.header')
       <section class="contact-us-section bg-custm contact-padding fix position-relative">

    <!-- Particles background -->
    <div id="particles-js" class="particles"></div>

            <div class="container-fluid">
                <div class="conatct-main-wrapper">
                    <div class="content p-5">
                        <h2>{{ $category->name }}</h2>
                      
                    </div>
                    </div>

                    </div>
                </section>
<!-- Product-details-Section Start -->
<section class="product-details-section section-padding pt-5 fix">
   <div class="container">
      <div class="product-details-wrapper">
         <!-- Subcategories -->
         <div class="tab-content">
            <div id="Course" class="tab-pane fade show active">
               <div class="row g-4">
                  @forelse ($subcategories as $subcategory)
                     <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="subcategory-card shadow-sm rounded-3 overflow-hidden h-100 d-flex flex-column">
                           
                           <!-- Image -->
                           <a href="{{ url('/allCategories/' . $category->id . '/' . $subcategory->id) }}">
                              <div class="subcategory-image">
                                 <img src="{{ $subcategory->image ? asset('storage/' . $subcategory->image) : asset('images/default-subcategory.jpg') }}" 
                                      alt="{{ $subcategory->name }}" class="img-fluid w-100 fixed-img">
                              </div>
                           </a>

                           <!-- Content -->
                           <div class="content p-3 d-flex flex-column flex-grow-1 text-center">
                              <p class="text-muted small mb-1">{{ $category->name }}</p>
                              
                              <h5 class="fw-bold mb-2">
                                 <a href="{{ url('/allCategories/' . $category->id . '/' . $subcategory->id) }}" 
                                    class="subcategory-title">
                                    {{ $subcategory->name }}
                                 </a>
                              </h5>

                              <p class="text-muted mb-3">{{ $subcategory->products_count }} Products</p>

                              <!-- Button aligned bottom -->
                              <div class="mt-auto">
                                 <a href="{{ url('/allCategories/' . $category->id . '/' . $subcategory->id) }}" 
                                    class="btn btn-outline-success btn-sm rounded-pill w-100">
                                    View Products <i class="fa-solid fa-chevron-right ms-2"></i>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  @empty
                     <div class="col-12 text-center my-5">
                        <h4 class="text-muted">🚀 No subcategories found in <strong>{{ $category->name }}</strong></h4>
                        <p>We’re adding products soon. Please check back later!</p>
                        <a href="{{ url()->previous() }}" class="theme-btn mt-3">
                           <i class="fa-solid fa-arrow-left"></i> Go Back
                        </a>
                     </div>
                  @endforelse
               </div>

               <!-- Pagination -->
               @if ($subcategories->total() > 0)
                  <div class="d-flex justify-content-between align-items-center mt-4">
                     <div>
                        Showing {{ $subcategories->firstItem() }} 
                        to {{ $subcategories->lastItem() }} 
                        of {{ $subcategories->total() }} entries
                     </div>
                     <div>
                        {{-- {{ $subcategories->links('pagination::bootstrap-5') }} --}}
                     </div>
                  </div>
               @endif
            </div>
         </div>
      </div>
   </div>
</section>
@include('includes.footer')