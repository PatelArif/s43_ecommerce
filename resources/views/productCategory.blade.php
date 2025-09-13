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
<section class="product-details-section section-padding pt-0 fix">
   <div class="container">
      <div class="product-details-wrapper">
         <!-- Subcategories -->
         <div class="tab-content">
            <div id="Course" class="tab-pane fade show active">
               <div class="row">
                  @forelse ($subcategories as $subcategory)
                  <div class="col-xl-3 col-lg-6 col-md-6">
                     <a href="{{ url('/allCategories/' . $category->id . '/' . $subcategory->id) }}">
                        <div class="product-details-item">
                           <div class="shop-image">
                              <img src="{{ $subcategory->image ? asset('storage/' . $subcategory->image) : asset('images/default-subcategory.jpg') }}" 
                                 alt="{{ $subcategory->name }}">
                           </div>
                           <div class="content">
                              <p>{{ $category->name }}</p>
                              <h3>
                     <a href="{{ url('/allCategories/' . $category->id . '/' . $subcategory->id) }}">
                     {{ $subcategory->name }}
                     </a>
                     </h3>
                     <p>{{ $subcategory->products_count }} Products</p>
                     </div>
                     </div>
                     </a>
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