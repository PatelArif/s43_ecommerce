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
                  <h2>Contact Messages</h2>
                    <button class="btn btn-primary" onclick="openAddModal()">
                        <i class="fas fa-plus"></i> Add Category
                    </button>

                </div>

  <div class="table-responsive">
      <table class="table table-striped table-hover table-bordered align-middle" id="datatable">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 border">#ID</th>
            <th class="px-4 py-2 border">Name</th>
            <th class="px-4 py-2 border">Email</th>
            <th class="px-4 py-2 border">Message</th>
            <th class="px-4 py-2 border">Submitted At</th>
            <th class="px-4 py-2 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($contacts as $contact)
            <tr>
                <td class="border px-4 py-2">{{ $contact->id }}</td>
                <td class="border px-4 py-2">{{ $contact->name }}</td>
                <td class="border px-4 py-2">{{ $contact->email }}</td>
                <td class="border px-4 py-2">{{ $contact->message }}</td>
                <td class="border px-4 py-2">{{ $contact->created_at->format('d M Y H:i') }}</td>
                <td class="border px-4 py-2"><button class="btn btn-danger">Delete</button> </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center p-4">No contacts found</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{-- {{ $contacts->links('pagination::tailwind') }} --}}
</div>


        <!-- Pagination -->
        {{-- {{ $contacts->paginate() }} --}}
    </div>
            </div>
        </main>
        @include('admin.includes.footer')
        <script>
            const assetBaseUrl = "{{ asset('storage') }}";
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

                let imageHtml = image ?
                    `<img src="${assetBaseUrl}/${image}" width="70" alt="Current Image">` :
                    '<span class="text-muted">No Image</span>';

                document.getElementById('existingImage').innerHTML = imageHtml;

                new bootstrap.Modal(document.getElementById('categoryModal')).show();
            }
        </script>
