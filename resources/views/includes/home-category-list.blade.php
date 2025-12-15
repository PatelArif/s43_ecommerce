<div class="row g-4">
    @foreach ($categories as $category)
        <div class="col-md-4">
            <div class="category-card h-100 p-4 text-center border rounded">

                <div class="icon mb-3 d-inline-flex align-items-center justify-content-center rounded-circle"
                     style="width: 60px; height: 60px; background-color: #D4EDDA;">
                    <i class="{{ $category->icon }} fs-3 text-success"></i>
                </div>

                <h5 class="mb-2 fw-bold">{{ $category->name }}</h5>

                <p class="mb-3 text-muted" style="font-size: 0.9rem;">
                    {{ $category->description }}
                </p>

                <div class="product-count mb-3 fw-semibold">
                    {{ $category->product_count ?? 0 }} products
                </div>

                <a href="{{ url('/allCategories/' . $category->id) }}"
                   class="btn btn-outline-success d-flex align-items-center justify-content-between w-100 px-3 py-2 rounded">
                    <span>Explore</span>
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>
        </div>
    @endforeach
    <div class="col-12 d-flex justify-content-center ">
        {{ $categories->links('includes.pagination') }}
    </div>
</div>

