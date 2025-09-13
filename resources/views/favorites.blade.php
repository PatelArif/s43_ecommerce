@include('includes.head')
@include('includes.header')

<section class="contact-us-section bg-custm contact-padding fix position-relative">
    <div id="particles-js" class="particles"></div>
    <div class="container-fluid">
        <div class="conatct-main-wrapper">
            <div class="content p-5">
                <h2>Your Favorites</h2>
            </div>
        </div>
    </div>
</section>

<div class="cart-section section-padding pt-4">
    <div class="container">
        <div class="cart-list-area">
            <div class="table-responsive">
                <table class="table common-table">
                    <thead data-aos="fade-down">
                        <tr>
                            <th class="text-center">Sr No.</th>
                            <th class="text-center">Product</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
    @if(isset($products) && $products->count() > 0)
        @php $srNo = 1; @endphp
        @foreach($products as $product)
            @php
                $price = $product->discount > 0 ? $product->after_discount_price : $product->price;
                $image = $product->main_image 
                    ? asset('storage/' . $product->main_image) 
                    : asset('assets/img/product/9.png');
            @endphp
            <tr id="favorite-row-{{ $product->id }}" class="align-items-center">
                <td class="text-center">{{ $srNo++ }}</td>

                <!-- Product Column -->
                <td>
                    <div class="cart-item-thumb d-flex align-items-center gap-2">
                        <img class="w-100" src="{{ $image }}" alt="{{ $product->title }}" style="max-width:60px;">
                        <span class="head text-nowrap">{{ $product->title }}</span>
                    </div>
                </td>

                <!-- Price Column -->
                <td class="text-center">₹{{ number_format($price, 2) }}</td>

                <!-- Action Column -->
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-4">
                        <!-- Remove from favorites -->
                        <form action="{{ route('favorites.remove', $product->id) }}" method="POST" class="remove-favorite-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link p-0 text-danger remove_btn" title="Remove">
                                
                                <i class="fas fa-times"></i>
                            </button>
                        </form>

                        <!-- Move to Cart -->
                        <button type="button" 
                            class="btn btn-link p-0 text-success move-to-cart-btn" 
                            data-url="{{ route('favorites.moveToCart', $product->id) }}" 
                            title="Move to Cart">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="4" class="text-center">No favorites added yet.</td>
        </tr>
    @endif
</tbody>

                </table>
            </div>

            @if(session('favorites') && count(session('favorites')) > 0)
                <div class="d-flex justify-content-end pt-4">
                    <a href="{{ route('index') }}" class="theme-btn alt-color radius-xs">Continue Shopping</a>
                </div>
            @endif
        </div>
    </div>
</div>

@include('includes.footer')
