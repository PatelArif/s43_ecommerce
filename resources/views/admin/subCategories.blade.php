@push('title')
<title>S4E Admin</title>
@endpush
<style>
    /* All pagination buttons */
 .page-link.active, .datatable-pagination a.active, .active > .page-link, .datatable-pagination .active > a{
  background-color:#014421 !important;
  color:#ffffff !important;
 }
 .page-link:focus, .datatable-pagination a:focus{
  box-shadow:none!important;
 }
 .page-link, .datatable-pagination a{
  color:#333!important;
 }
    /* Hover state */
</style>


@include('admin.includes.header')

        <div id="layoutSidenav">
          
               @include('admin.includes.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <div class="mb-4 pt-3 d-flex justify-content-between align-items-center">
                        <h2>Sub Categories</h2>
                       <button class="btn btn-primary" onclick="openAddModal()">
  <i class="fas fa-plus"></i> Add Category
</button>

                    </div>

                        
           <!-- Reusable Add/Edit Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="categoryForm" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" id="formMethod" value="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryModalLabel">Add Sub Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    <div class="modal-body">
     <div class="mb-3">
    <label for="parentCategory" class="form-label">Select Category</label>
    <select name="category_id" id="parentCategory" class="form-select" required>
        <option value="">-- Select Category --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" 
                @if(isset($selectedCategory) && $selectedCategory->id == $category->id) selected @endif>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

          <div class="mb-3">
            <label for="categoryName" class="form-label">Sub Category Name</label>
            <input type="text" name="name" id="categoryName" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="categoryImage" class="form-label">Category Image</label>
            <input type="file" name="image" id="categoryImage" class="form-control" accept="image/*">
            <div id="existingImage" class="mt-2"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="modalSubmitBtn">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

<form method="GET" action="{{ route('subCategories.index') }}" class="mb-3">
    <select name="category_id" onchange="this.form.submit()" class="form-select w-auto d-inline-block">
        <option value="">-- All Categories --</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>
</form>
<div class="table-responsive">
      <table class="table table-striped table-hover table-bordered align-middle"id="datatable">
            <thead>
                <tr>
                   <th class="text-center">Sr No.</th>
                    <th class="text-center">Name</th>
                         <th class="text-center">Category</th> 
                    <th class="text-center">Image</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
               @foreach($subCategories as $index => $subcategory)
<tr>
    <td class="text-center"><h5>{{ $index + 1 }}</h5></td>
    <td class="text-center"><h5>{{ $subcategory->name }}</h5></td>
    <td class="text-center"><h5>{{ $subcategory->category->name ?? '—' }}</h5></td> {{-- Show related category --}}
    <td class="text-center">
        @if($subcategory->image)
            <img src="{{ asset('storage/' . $subcategory->image) }}" alt="Subcategory Image" width="100">
        @else
            <span class="text-muted">No Image</span>
        @endif
    </td>
    <td class="text-center">
      <button class="btn btn-lg btn-warning"
    onclick="openEditModal({{ $subcategory->id }}, '{{ $subcategory->name }}', '{{ $subcategory->image }}', {{ $subcategory->category_id }})">
    <i class="fas fa-edit"></i>
</button>


        <form action="{{ route('subCategories.destroy', $subcategory->id) }}" method="POST" class="d-inline"
              onsubmit="return confirm('Are you sure you want to delete this subcategory?');">
            @csrf
            @method('DELETE')
            <button class="btn btn-lg btn-danger"><i class="fas fa-trash"></i></button>
        </form>
    </td>
</tr>
@endforeach

</tbody>
</table>
</div>




 </div>
 </main>
             @include('admin.includes.footer')
             <script>
function openAddModal() {
    document.getElementById('categoryModalLabel').innerText = 'Add Category';
    document.getElementById('categoryForm').action = "{{ route('subCategories.store') }}";
    document.getElementById('formMethod').value = 'POST';
    document.getElementById('categoryName').value = '';
    document.getElementById('categoryImage').value = '';
    document.getElementById('existingImage').innerHTML = '';
    new bootstrap.Modal(document.getElementById('categoryModal')).show();
}

function openEditModal(id, name, image, categoryId) {
    document.getElementById('categoryModalLabel').innerText = 'Edit Category';
    document.getElementById('categoryForm').action = `/admin/subCategories/${id}`;
    document.getElementById('formMethod').value = 'PUT';
    document.getElementById('categoryName').value = name;
    document.getElementById('categoryImage').value = '';
    document.getElementById('parentCategory').value = categoryId;

    let imageHtml = image
        ? `<img src="/storage/${image}" width="70" alt="Current Image">`
        : '<span class="text-muted">No Image</span>';
    document.getElementById('existingImage').innerHTML = imageHtml;

    new bootstrap.Modal(document.getElementById('categoryModal')).show();
}

</script>
