@push('title')
<title>S4E Admin - Products</title>
@endpush

@include('admin.includes.header')

<div id="layoutSidenav">
    @include('admin.includes.sidebar')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="mb-4 pt-3 d-flex justify-content-between align-items-center">
                    <h2>Products</h2>
                    <button class="btn btn-primary" onclick="openAddProductModal()">
                        <i class="fas fa-plus"></i> Add Product
                    </button>
                </div>

                {{-- Filter Form --}}
                <form method="GET" action="{{ route('products.index') }}" class="mb-3">
                    <select name="category_id" onchange="this.form.submit()" class="form-select w-auto d-inline-block me-2">
                        <option value="">-- All Categories --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>

                    <select name="subcategory_id" onchange="this.form.submit()" class="form-select w-auto d-inline-block">
                        <option value="">-- All Subcategories --</option>
                        @foreach($subcategories as $sub)
                            <option value="{{ $sub->id }}" {{ request('subcategory_id') == $sub->id ? 'selected' : '' }}>{{ $sub->name }}</option>
                        @endforeach
                    </select>
                </form>

                {{-- Products Table --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle"id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Main Image</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->category->name ?? '—' }}</td>
                                <td>{{ $product->subcategory->name ?? '—' }}</td>
                                <td>
                                    @if($product->main_image)
                                        <img src="{{ asset(config('constants.IMAGE_PATH'). $product->main_image) }}" alt="Image" width="80">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount ?? 0 }}</td>
                                <td>
                                    <button class="btn btn-warning" onclick="openEditProductModal({{ $product->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- {{ $products->links() }} --}}
            </div>
        </main>

        @include('admin.includes.footer')
    </div>
</div>
{{-- Reusable Add/Edit Product Modal --}}
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form id="productForm" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" id="productFormMethod" value="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productModalLabel">Add Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body row">
          <!-- Category & Subcategory -->
          <div class="mb-3 col-md-6">
            <label for="productCategory" class="form-label">Category</label>
            <select id="productCategory" name="category_id" class="form-select" required>
              <option value="">-- Select Category --</option>
              @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3 col-md-6">
            <label for="productSubcategory" class="form-label">Subcategory</label>
            <select id="productSubcategory" name="subcategory_id" class="form-select" required>
              <option value="">-- Select Subcategory --</option>
              @foreach($subcategories as $sub)
                <option value="{{ $sub->id }}">{{ $sub->name }}</option>
              @endforeach
            </select>
          </div>

          <!-- Title & Description -->
          <div class="mb-3 col-md-12">
            <label for="productTitle" class="form-label">Title</label>
            <input type="text" id="productTitle" name="title" class="form-control" required>
          </div>
          <div class="mb-3 col-md-12">
            <label for="productDescription" class="form-label">Description</label>
            <textarea id="productDescription" name="description" class="form-control" rows="3" required></textarea>
          </div>
       
          <!-- Price & Discount -->
          <div class="mb-3 col-md-6">
            <label for="productPrice" class="form-label">Price</label>
            <input type="number" step="0.01" id="productPrice" name="price" class="form-control" required>
          </div>
          <div class="mb-3 col-md-6">
            <label for="productDiscount" class="form-label">Discount (%)</label>
            <input type="number" step="0.01" id="productDiscount" name="discount" class="form-control">
          </div>
            <div class="mb-3 col-md-6">
          <label for="productAfterDiscountPrice" class="form-label">After Discount Price</label>
          <input type="number" step="0.01" id="productAfterDiscountPrice" name="after_discount_price" class="form-control" readonly>
          </div>
          <!-- Height -->
          <div class="mb-3 col-md-6">
              <label for="productHeight" class="form-label">Height</label>
              <input type="text" id="productHeight" name="height" class="form-control">
          </div>

          <!-- Width -->
          <div class="mb-3 col-md-6">
              <label for="productWidth" class="form-label">Width</label>
              <input type="text" id="productWidth" name="width" class="form-control">
          </div>

          <!-- Handle -->
              <div class="mb-3 col-md-6">
          <label for="productHandle" class="form-label">Handle</label>
          <select id="productHandle" name="productHandle"  id="productHandle" class="form-control" required>
              <option value="">-- Select --</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
          </div>

          <!-- Base -->
          <div class="mb-3 col-md-6">
              <label for="productBase" class="form-label">Base</label>
              <input type="text" id="productBase" name="base" class="form-control">
          </div>
            <div class="mb-3 col-md-6">
          <label for="featureProduct" class="form-label">Feature Product</label>
          <select id="featureProduct" name="featureProduct" class="form-control" required>
              <option value="">-- Select --</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
          </div>

          <!-- Images -->
          @foreach (['main_image' => 'Main Image', 'image_1' => 'Image 1', 'image_2' => 'Image 2', 'image_3' => 'Image 3', 'image_4' => 'Image 4'] as $field => $label)
          <div class="mb-3 col-md-6">
            <label for="{{ $field }}" class="form-label">{{ $label }}</label>
            <input type="file" id="{{ $field }}" name="{{ $field }}" class="form-control" accept="image/*">
            <div id="preview_{{ $field }}" class="mt-2"></div>
          </div>
          @endforeach

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const priceInput = document.getElementById('productPrice');
  const discountInput = document.getElementById('productDiscount');
  const afterDiscountPriceInput = document.getElementById('productAfterDiscountPrice');

  function calculateDiscountedPrice() {
    const price = parseFloat(priceInput.value) || 0;
    const discount = parseFloat(discountInput.value) || 0;
    
    const discountedPrice = price - (price * (discount / 100)); // Corrected to use 'price'

    afterDiscountPriceInput.value = discountedPrice.toFixed(2); // Display with 2 decimal places
  }

  priceInput.addEventListener('input', calculateDiscountedPrice);
  discountInput.addEventListener('input', calculateDiscountedPrice);
});


function openAddProductModal() {
  document.querySelector('#productModal .modal-title').innerText = 'Add Product';
  document.querySelector('#productModal .btn-success').innerText = 'Add';

  document.getElementById('productForm').reset();
  document.getElementById('productForm').action = "{{ route('products.store') }}";
  document.getElementById('productFormMethod').value = 'POST';
  resetImagePreviews();
  new bootstrap.Modal(document.getElementById('productModal')).show();
}

function openEditProductModal(id) {
  fetch(`/admin/products/${id}`)
    .then(res => res.json())
    .then(product => {
      document.querySelector('#productModal .modal-title').innerText = 'Edit Product';
      document.getElementById('productForm').action = `/admin/products/${id}`;
      document.getElementById('productFormMethod').value = 'PUT';
      document.querySelector('#productModal .btn-success').innerText = 'Update';
      // Fill basic fields
      document.getElementById('productTitle').value = product.title;
      document.getElementById('productPrice').value = product.price;
      document.getElementById('productDiscount').value = product.discount || '';
      document.getElementById('productAfterDiscountPrice').value = product.after_discount_price;
      document.getElementById('productHeight').value = product.height;
      document.getElementById('productWidth').value = product.width;
      document.getElementById('productHandle').value = product.handle;
      document.getElementById('featureProduct').value = product.feature_product;

      document.getElementById('productBase').value = product.base;
      document.getElementById('productDescription').value = product.description || '';
      document.getElementById('productCategory').value = product.category_id;
      document.getElementById('productSubcategory').value = product.subcategory_id;

      // Reset and preview existing images
      resetImagePreviews();
      const catSlug = product.category_slug;
      const image_path = "{{ config('constants.IMAGE_PATH') }}";
          
      ['main_image','image_1','image_2','image_3','image_4'].forEach(f => {
        if (product[f]) {
          const url = `/${image_path}${product[f]}`;
          document.getElementById('preview_' + f).innerHTML = `<img src="${url}" width="100" class="img-thumbnail" />`;
        }
      });

      // Show the modal
      new bootstrap.Modal(document.getElementById('productModal')).show();
    })
    .catch(err => console.error('Failed to load product data:', err));
}

function resetImagePreviews() {
  ['main_image', 'image_1', 'image_2', 'image_3', 'image_4'].forEach(f => {
    document.getElementById('preview_' + f).innerHTML = '';
  });
}
</script>


</script>
