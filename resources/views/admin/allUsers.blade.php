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
                    <h2>All Website Users</h2>
                    <button class="btn btn-primary" onclick="openAddModal()">
                        <i class="fas fa-plus"></i> Add User
                    </button>
                </div>

                <!-- Reusable Add/Edit User Modal -->
                <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="userForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" id="formMethod" value="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="userModalLabel">Add User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Full Name</label>
                                        <input type="text" name="name" id="userName" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userEmail" class="form-label">Email</label>
                                        <input type="email" name="email" id="userEmail" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userProfileImage" class="form-label">Profile Image</label>
                                        <input type="file" name="profile_image" id="userProfileImage" class="form-control" accept="image/*">
                                        <div id="existingImage" class="mt-2"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userPassword" class="form-label">Password</label>
                                        <input type="password" name="password" id="userPassword" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="modalSubmitBtn">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-center">Sr No.</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Profile Image</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $index => $user)
                                <tr>
                                    <td class="text-center"><h5>{{ $index + 1 }}</h5></td>
                                    <td class="text-center"><h5>{{ $user->name }}</h5></td>
                                    <td class="text-center"><h5>{{ $user->email }}</h5></td>
                                    <td class="text-center">
                                        @if($user->profile_image)
                                            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="User Image" width="100">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-lg btn-warning"
                                            onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->profile_image }}')">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this user?');">
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
            document.getElementById('userModalLabel').innerText = 'Add User';
            document.getElementById('userForm').action = "{{ route('user_register') }}";
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('userName').value = '';
            document.getElementById('userEmail').value = '';
            document.getElementById('userProfileImage').value = '';
            document.getElementById('existingImage').innerHTML = '';
            document.getElementById('userPassword').value = '';
            new bootstrap.Modal(document.getElementById('userModal')).show();
        }

        function openEditModal(id, name, email, profileImage) {
            document.getElementById('userModalLabel').innerText = 'Edit User';
            document.getElementById('userForm').action = `/admin/users/${id}`;
            document.getElementById('formMethod').value = 'PUT';
            document.getElementById('userName').value = name;
            document.getElementById('userEmail').value = email;
            document.getElementById('userProfileImage').value = '';
            
            let imageHtml = profileImage
                ? `<img src="/storage/${profileImage}" width="70" alt="Current Image">`
                : '<span class="text-muted">No Image</span>';
            document.getElementById('existingImage').innerHTML = imageHtml;

            new bootstrap.Modal(document.getElementById('userModal')).show();
        }
        </script>
    </div>
</div>
