@extends('app')

@push('title')
    <title>Contact us | Step4Environment</title>
@endpush

@section('content')

<style>div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-confirm) { border: 0; border-radius: .25em; background: initial; background-color: #DC0807; color: #fff; font-size: 1em; } div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-cancel) { border: 0; border-radius: .25em; background: initial; background-color: #028540; color: #fff; font-size: 1em; } div:where(.swal2-icon).swal2-warning { border-color: #4f6d44; color: #dc3545; }
</style>
      <section class="contact-us-section bg-custm contact-padding fix position-relative">
    <!-- Particles background -->
    <div id="particles-js" class="particles"></div>

            <div class="container-fluid">
                <div class="conatct-main-wrapper">
                    <div class="content p-5">
                        <h2>My Account</h2>
                      
                    </div>
                    </div>

                    </div>
                </section>
<!-- My-account-Section Start -->
<section class="my-account-section section-padding fix">
  <div class="container">
    <div class="my-account-wrapper">
      <div class="row g-4">
        <div class="col-lg-4">
          <div class="wrap-sidebar-account">
            <div class="sidebar-account">
              <div class="account-avatar">
                <div class="image">
                  {{-- <img src="assets/img/avater.jpg" alt="img"> --}}
                  <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/default.png') }}" alt="Profile" class="img-fluid" />
                </div>
                <h6 class="mb_4">{{ $user->first_name }} {{ $user->last_name }} </h6>
                <div class="body-text-1">{{ $user->email }}</div>
              </div>
              <ul class="nav">
                <li class="nav-item">
                  <a href="#Course" data-bs-toggle="tab" class="nav-link active">
                  <i class="fa-regular fa-user"></i>
                  Account Details
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#Curriculum" data-bs-toggle="tab" class="nav-link">
                  <i class="fa-sharp fa-regular fa-bag-shopping"></i>
                  Your Orders
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#Instructors" data-bs-toggle="tab" class="nav-link">
                  <i class="fa-regular fa-location-dot"></i>
                  My Address
                  </a>
                </li>
                <li class="nav-item">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn  nav-link "> <i class="fa-regular fa-share-from-square"></i>Logout</button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="tab-content">
            <div id="Course" class="tab-pane fade show active">
              <div class="account-details">
                @if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
                <form id="user_edit_form" method="POST" >
                  @csrf
                  <div class="account-info">
                    <h3>Information</h3>
                    <div class="col-lg-12">
                      <div class="form-clt">
                        <label for="profile_image">Upload Profile Picture</label>
                        <input type="file" name="profile_image" id="profile_image" accept="image/*">
                      </div>
                    </div>
                    <div class="row g-4">
                      <div class="col-lg-6">
                        <div class="form-clt">
                          <input type="text" name="first_name" id="first_name" placeholder="Tony" value="{{ $user->first_name }}">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-clt">
                          <input type="text" name="last_name" id="last_name" placeholder="Nguyen"value="{{ $user->last_name }}">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-clt">
                          <input type="text" name="email" id="email" placeholder="Email" value="{{ $user->email }}">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-clt">
                          <input type="text" name="number" id="number" placeholder="mobile no." value="{{ $user->mobile }}">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="account-password">
                    <div class="account-info">
                      <h3>Change Password</h3>
                      <div class="row g-4">
                        <div class="col-lg-12">
                          <div class="form-clt">
                            <input id="current_password" type="password" name="current_password" placeholder="Current Password" >
                            <div class="icon"><i class="far fa-eye-slash"></i></div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-clt">
                            <input id="new_password" type="password" name="new_password" placeholder="New Password" >
                            <div class="icon"><i class="far fa-eye-slash"></i></div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-clt">
                            <input id="confirm_password" type="password" name="new_password_confirmation" placeholder="Confirm New Password" >
                            <div class="icon"><i class="far fa-eye-slash"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center mt-4">
                    <button type="submit" class="btn edit_btn" >
                    Update Profile
                    </button>
                  </div>
                </form>
              </div>
            </div>
   <div id="Curriculum" class="tab-pane fade show">
  <div class="account-info">
    <h3 class="mb-3">My Orders</h3>

    <div class="table-responsive">
        <table id="ordersTable" class="table table-hover table-bordered text-center align-middle dt-responsive nowrap" style="width:100%">
            <thead class="table-success">
                <tr>
                    <th>Sr No</th>
                    <th>Order #</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Invoice</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->order_number ?? $order->id }}</td>
                        <td>${{ number_format($order->total, 2) }}</td>
                        <td>{{ ucfirst($order->payment_method) }}</td>
                        <td>
                            @if($order->status == 'pending')
                                <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span>
                            @elseif($order->status == 'approved')
                                <span class="badge bg-success">{{ ucfirst($order->status) }}</span>
                            @elseif($order->status == 'rejected')
                                <span class="badge bg-danger">{{ ucfirst($order->status) }}</span>
                            @endif
                        </td>
                        <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                        <td>
                            <a href="{{ route('order.invoicePdf', $order->id) }}" class="btn btn-sm btn-success">
                                View Invoice
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</div>




            <div id="Instructors" class="tab-pane fade">
              <div class="axil-dashboard-address">
                <h5 class=" mb-4  text-black">
                  The following addresses will be used on the checkout page by default.
                </h5>
                <div class="row g-4">
                  <div class="col-lg-6">
                    <div class="address-info border rounded p-4 shadow-sm">
                      <div class="addrss-header d-flex align-items-center justify-content-between mb-3">
                        <h4 class="title fw-bold fs-4 text-dark">Shipping Details</h4>
                        <a href="#" class="address-edit text-primary fs-5" data-bs-toggle="modal" data-bs-target="#editAddressModal">
                        <i class="far fa-edit"></i>
                        </a>
                      </div>
                      <ul class="address-details list-unstyled fs-5 lh-lg">
                        <li><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</li>
                        <li>
                          <strong>Email:</strong>
                          <a href="mailto:{{ $user->email }}" class="text-decoration-none text-dark">
                          {{ $user->email }}
                          </a>
                        </li>
                        <li>
                          <strong>Alternative Phone:</strong>
                          <a href="tel:{{ $user->phone }}" class="text-decoration-none text-dark">
                          {{ $user->phone }}
                          </a>
                        </li>
                        <hr>
                        <h5 class="fw-bold mt-3">Address</h5>
                        <li class="style-3">
                          {{ $user->address_line }} <br>
                          {{ $user->city }}, {{ $user->state }} {{ $user->zip_code }} <br>
                          {{ $user->country }}
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{-- 
            <div id="Reviews" class="tab-pane fade">
              <div class="account-wrapper">
                <div class="account-box">
                  <h3 class="mb-3">Login to Sofia.</h3>
                  <h6>Don’t have an account? <span>Create a free account</span></h6>
                  <p class="mt-4">or Sign in with Email</p>
                  <div class="contact-form-item">
                    <form action="#" id="contact-form3" method="POST">
                      <div class="row g-4">
                        <div class="col-lg-12">
                          <div class="form-clt">
                            <input type="text" name="email" id="email20" placeholder="Your Email">
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-clt">
                            <input type="text" name="subject" id="email21" placeholder="Password">
                            <div class="icon">
                              <i class="fa-regular fa-eye"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="from-cheak-items">
                            <div class="form-check d-flex gap-2 from-customradio">
                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                              <label class="form-check-label" for="flexRadioDefault1">
                              Remember Me
                              </label>
                            </div>
                            <span>Forgot Password?</span>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <button type="submit" class="theme-btn header-btn w-100">
                          Login
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Edit Address Modal -->
<div class="modal fade" id="editAddressModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form method="POST" action="{{ route('user.updateAddress') }}" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Edit Shipping Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="text" name="phone" class="form-control mb-2" value="{{ $user->phone }}" placeholder="Phone">
        <input type="text" name="address_line" class="form-control mb-2" value="{{ $user->address_line }}" placeholder="Address Line">
        <input type="text" name="city" class="form-control mb-2" value="{{ $user->city }}" placeholder="City">
        <input type="text" name="state" class="form-control mb-2" value="{{ $user->state }}" placeholder="State">
        <input type="text" name="zip_code" class="form-control mb-2" value="{{ $user->zip_code }}" placeholder="Zip Code">
        <input type="text" name="country" class="form-control mb-2" value="{{ $user->country }}" placeholder="Country">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save Address</button>
      </div>
    </form>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  let originalData = $('#user_edit_form').serialize();
  let imageChanged = false; // Track if image has changed
  
  // Detect image input change
  $('#profile_image').on('change', function () {
    imageChanged = true;
  });
  
  $('#user_edit_form').on('submit', function(e) {
    e.preventDefault();
  
    let currentData = $(this).serialize();
  
    // Check if text fields changed or image was selected
    if (originalData === currentData && !imageChanged) {
        Swal.fire({
            title: 'No Changes Detected',
            text: 'Please update some fields before submitting.',
            icon: 'info',
            confirmButtonText: 'OK'
        });
        return;
    }
  
    const $submitBtn = $(this).find('button[type="submit"]');
    $submitBtn.prop('disabled', true).text('Updating...');
  
    let formData = new FormData(this); // Use FormData for file upload support
  
    $.ajax({
        url: '/user_edit',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            Swal.fire({
                title: 'Success!',
                text: response.message || 'Profile updated successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '/my-account';
            });
        },
        error: function(xhr) {
            let errors = xhr.responseJSON?.errors;
            let errorMessages = "";
  
            if (errors) {
                for (let key in errors) {
                    errorMessages += errors[key][0] + "\n";
                }
            } else {
                errorMessages = xhr.responseJSON?.message || "An unexpected error occurred.";
            }
  
            Swal.fire({
                title: 'Error!',
                text: errorMessages,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        },
        complete: function() {
            $submitBtn.prop('disabled', false).text('Update Profile');
        }
    });
  });
</script>
<script>
  document.getElementById('logout-form').addEventListener('submit', function(event) {
      event.preventDefault();  // Prevent the default form submission
      
      Swal.fire({
          title: 'Are you sure?',
          text: 'Do you really want to log out?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, log me out',
          cancelButtonText: 'No, stay logged in',
      }).then((result) => {
          if (result.isConfirmed) {
              // Submit the form if user confirms
              document.getElementById('logout-form').submit();
          }
      });
  });
  
</script>
<script>
  document.querySelectorAll('.form-clt .icon').forEach(icon => {
      icon.addEventListener('click', function () {
          const input = this.previousElementSibling;
          if (input.type === "password") {
              input.type = "text";
              this.innerHTML = '<i class="far fa-eye"></i>';
          } else {
              input.type = "password";
              this.innerHTML = '<i class="far fa-eye-slash"></i>';
          }
      });
  });
</script>
@endsection
