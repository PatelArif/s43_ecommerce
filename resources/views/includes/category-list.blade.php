<div class="row g-4">
    @foreach ($categories as $category)
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="category-card shadow-sm rounded-3 overflow-hidden h-100 d-flex flex-column">

                <div class="category-image">
                    <img src="{{ asset(config('constants.IMAGE_PATH') . $category->image) }}"
                         class="img-fluid w-100 fixed-img"
                         alt="{{ $category->name }}">
                </div>

                <div class="content p-4 text-center d-flex flex-column flex-grow-1">
                    <h4 class="fw-bold mb-2">{{ $category->name }}</h4>

                    <p class="text-muted">
                        {{ $category->subcategories_count ?? 0 }} Sub Categories
                    </p>

                    <div class="mt-auto">
                        <a href="{{ url('/allCategories/' . $category->id) }}"
                           class="btn btn-outline-success btn-sm rounded-pill w-100">
                            Shop Now <i class="fa fa-chevron-right ms-2"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>

<div class="row mt-5">
    <div class="col-12 d-flex justify-content-center">
        {{ $categories->links('includes.pagination') }}
    </div>
</div>
