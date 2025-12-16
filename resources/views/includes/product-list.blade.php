<div class="row">
    @forelse($products as $product)
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="product-card shadow-sm rounded-3 overflow-hidden h-100 d-flex flex-column">

                <div class="product-image">
                    <a href="{{ route('productDetails', $product->id) }}">
                        <img src="{{ asset(config('constants.IMAGE_PATH') . $product->main_image) }}"
                             class="img-fluid w-100 fixed-img"
                             alt="{{ $product->title }}">
                    </a>
                </div>

                <div class="content p-3 text-center d-flex flex-column flex-grow-1">
                    <p class="text-muted small mb-1">{{ $subcategory->name }}</p>

                    <h5 class="fw-bold mb-2">
                        <a href="{{ url('product-details/'.$product->id) }}">
                            {{ $product->title }}
                        </a>
                    </h5>

                    <div class="star mb-2 text-warning">
                        @for($i = 0; $i < 5; $i++)
                            <i class="fa-solid fa-star"></i>
                        @endfor
                    </div>

                    <h6 class="mb-3">
                        <span class="fw-bold text-success">${{ $product->after_discount_price }}</span>
                        <del class="text-muted">${{ $product->price }}</del>
                        <span class="text-danger">-{{ $product->discount }}%</span>
                    </h6>

                    <div class="mt-auto">
                        <a href="{{ url('product-details/'.$product->id) }}"
                           class="btn btn-outline-success btn-sm rounded-pill w-100">
                            Buy Now <i class="fa fa-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning text-center py-4">
                No products found in <strong>{{ $subcategory->name }}</strong>
            </div>
        </div>
    @endforelse
</div>

@if ($products->total() > 0)
<div class="d-flex justify-content-center align-items-center mt-4">

    <div>
        {{ $products->links('includes.pagination') }}
    </div>
</div>
@endif
