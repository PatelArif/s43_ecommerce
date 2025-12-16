@push('title')
<title>S4E Admin</title>
@endpush @include('admin.includes.header')

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

                <!-- Modal -->
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
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" name="first_name" id="firstName" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" name="last_name" id="lastName" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userEmail" class="form-label">Email</label>
                                        <input type="email" name="email" id="userEmail" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userMobile" class="form-label">Mobile</label>
                                        <input type="text" name="mobile" id="userMobile" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userProfileImage" class="form-label">Profile Image</label>
                                        <input type="file" name="profile_image" id="userProfileImage" class="form-control" accept="image/*">
                                        <div id="existingImage" class="mt-2"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userPassword" class="form-label">Password</label>
                                        <input class="form-control" id="userPassword" type="password" name="password" placeholder="Create a password" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputPasswordConfirm" class="form-label">Confirm Password</label>
                                        <input class="form-control" id="inputPasswordConfirm" type="password" name="password_confirmation" placeholder="Confirm password" >
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
                                            <img src="{{ asset(config('constants.IMAGE_PATH'). $user->profile_image) }}" alt="User Image" width="100">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-lg btn-warning"
                                            onclick="openEditModal({{ $user->id }}, '{{ $user->first_name }}', '{{ $user->last_name }}', '{{ $user->email }}', '{{ $user->mobile }}', '{{ $user->profile_image }}')">
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

        <!-- Toast Container -->
        <div id="toast-container" style="position: fixed; top: 1rem; right: 1rem; z-index: 9999;"></div>

        <script>
        function openAddModal() {
            const form = document.getElementById('userForm');
            form.reset();
            document.getElementById('formMethod').value = 'POST';
            form.action = "{{ route('store') }}";
            document.getElementById('userModalLabel').textContent = 'Add User';
            document.getElementById('modalSubmitBtn').textContent = 'Save';
            document.getElementById('existingImage').innerHTML = '';
            new bootstrap.Modal(document.getElementById('userModal')).show();
        }

        function openEditModal(id, firstName, lastName, email, mobile, profileImage) {
            const form = document.getElementById('userForm');
            form.reset();
      const image_path = "{{ config('constants.IMAGE_PATH') }}";
                  form.action = `/admin/allUsers/${id}`;
            document.getElementById('formMethod').value = 'PUT';
            document.getElementById('userModalLabel').textContent = 'Edit User';
            document.getElementById('modalSubmitBtn').textContent = 'Update';
            document.getElementById('firstName').value = firstName;
            document.getElementById('lastName').value = lastName;
            document.getElementById('userEmail').value = email;
            document.getElementById('userMobile').value = mobile;
            document.getElementById('existingImage').innerHTML = profileImage
                ? `<img src="/${image_path}${profileImage}" alt="Current Image" class="img-thumbnail" width="100">`
                : '<span class="text-muted">No Image</span>';
            new bootstrap.Modal(document.getElementById('userModal')).show();
        }

        document.getElementById('userForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);
            const method = document.getElementById('formMethod').value;

            if (method === 'PUT') {
                formData.append('_method', 'PUT');
            }

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) return response.json().then(err => { throw err });
                return response.json();
            })
            .then(data => {
                showToast('success', data.message || 'User saved successfully!');
                setTimeout(() => location.reload(), 1500);
            })
            .catch(error => {
                if (error.errors) {
                    Object.values(error.errors).flat().forEach(msg => showToast('error', msg));
                } else {
                    showToast('error', 'An unknown error occurred.');
                }
            });
        });

        function showToast(type, message) {
            const toast = document.createElement('div');
            toast.className = `toast align-items-center text-white ${type === 'error' ? 'bg-danger' : 'bg-success'} border-0`;
            toast.setAttribute('role', 'alert');
            toast.setAttribute('aria-live', 'assertive');
            toast.setAttribute('aria-atomic', 'true');
            toast.style.minWidth = '250px';
            toast.style.marginBottom = '0.5rem';
            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">${message}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>`;
            document.getElementById('toast-container').appendChild(toast);
            const bsToast = new bootstrap.Toast(toast, { delay: 3000 });
            bsToast.show();
            toast.addEventListener('hidden.bs.toast', () => toast.remove());
        }
        </script>
        @include('admin.includes.footer')
    </div>
</div>
