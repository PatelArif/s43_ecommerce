<div class="row g-4">
    @forelse ($subcategories as $subcategory)
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="subcategory-card shadow-sm rounded-3 overflow-hidden h-100 d-flex flex-column">

                <a href="{{ url('/allCategories/' . $category->id . '/' . $subcategory->id) }}">
                    <div class="subcategory-image">
                        <img src="{{ $subcategory->image
                            ? asset(config('constants.IMAGE_PATH') . $subcategory->image)
                            : asset('images/default-subcategory.jpg') }}"
                             class="img-fluid w-100 fixed-img"
                             alt="{{ $subcategory->name }}">
                    </div>
                </a>

                <div class="content p-3 text-center d-flex flex-column flex-grow-1">
                    <p class="text-muted small mb-1">{{ $category->name }}</p>

                    <h5 class="fw-bold mb-2">
                        <a href="{{ url('/allCategories/' . $category->id . '/' . $subcategory->id) }}">
                            {{ $subcategory->name }}
                        </a>
                    </h5>

                    <p class="text-muted mb-3">
                        {{ $subcategory->products_count }} Products
                    </p>

                    <div class="mt-auto">
                        <a href="{{ url('/allCategories/' . $category->id . '/' . $subcategory->id) }}"
                           class="btn btn-outline-success btn-sm rounded-pill w-100">
                            View Products <i class="fa fa-chevron-right ms-2"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    @empty
        <div class="col-12 text-center my-5">
            <h4 class="text-muted">
                🚀 No subcategories found in <strong>{{ $category->name }}</strong>
            </h4>
            <p>We’re adding products soon. Please check back later!</p>
        </div>
    @endforelse
</div>

@if ($subcategories->total() > 0)
<div class="d-flex justify-content-center align-items-center mt-4">
    {{-- <div>
        Showing {{ $subcategories->firstItem() }}
        to {{ $subcategories->lastItem() }}
        of {{ $subcategories->total() }} entries
    </div> --}}

    <div>
        {{ $subcategories->links('includes.pagination') }}
    </div>
</div>
@endif
