@push('title')
<title>S4E Admin</title>
@endpush
@include('admin.includes.header')

        <div id="layoutSidenav">
          
               @include('admin.includes.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <div class="mb-4 pt-3 d-flex justify-content-between align-items-center">
                        <h2>All Categories</h2>
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
          <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="categoryName" class="form-label">Category Name</label>
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

{{-- <div class="card mb-4"> --}}
    {{-- <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All Categories
    </div> --}}
    {{-- <div class="card-body"> --}}
  <div class="table-responsive">
  <table class="table table-striped table-hover table-bordered align-middle" id="datatable">
            <thead>
                <tr>
                    <th class="text-center">Sr No.</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $index => $category)
                <tr>
                    <td class="text-center"><h5>{{ $index + 1 }}</h5></td>
                    <td class="text-center"><h5>{{ $category->name }}</h5></td>
                    <td class="text-center">
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="100">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td class="text-center">
                   <button class="btn btn-lg btn-warning"
                      onclick="openEditModal({{ $category->id }}, '{{ addslashes($category->name) }}', '{{ $category->image }}')"
>
                        <i class="fas fa-edit"></i>
                    </button>

                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this category?');">
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
{{-- </div> --}}

                       
                    </div>
                </main>
             @include('admin.includes.footer')
             <script>
    const assetBaseUrl = "{{ asset('/storage') }}";
  
</script>
             <script>
function openAddModal() {
    document.getElementById('categoryModalLabel').innerText = 'Add Category';
    document.getElementById('categoryForm').action = "{{ route('categories.store') }}";
    document.getElementById('formMethod').value = 'POST';
    document.getElementById('categoryName').value = '';
    document.getElementById('categoryImage').value = '';
    document.getElementById('existingImage').innerHTML = '';
    new bootstrap.Modal(document.getElementById('categoryModal')).show();
}

function openEditModal(id, name, image) {
    document.getElementById('categoryModalLabel').innerText = 'Edit Category';
    document.getElementById('categoryForm').action = `/admin/categories/${id}`;
    document.getElementById('formMethod').value = 'PUT';
    document.getElementById('categoryName').value = name;
    document.getElementById('categoryImage').value = '';

    let imageHtml = image
        ? `<img src="${assetBaseUrl}/${image}" width="70" alt="Current Image">`
        : '<span class="text-muted">No Image</span>';

    document.getElementById('existingImage').innerHTML = imageHtml;

    new bootstrap.Modal(document.getElementById('categoryModal')).show();
}


</script>
