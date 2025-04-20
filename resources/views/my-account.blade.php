@include('includes.head')
@include('includes.header')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<style>
      div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-confirm) {
                                                                    border: 0;
                                                                    border-radius: .25em;
                                                                    background: initial;
                                                                    background-color: #DC0807;
                                                                    color: #fff;
                                                                    font-size: 1em;
                                                                }
                                                                div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-cancel) {
    border: 0;
    border-radius: .25em;
    background: initial;
    background-color: #028540;
    color: #fff;
    font-size: 1em;
}
div:where(.swal2-icon).swal2-warning {
    border-color: #4f6d44;
    color: #dc3545;
}
</style>
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
                                            <img src="assets/img/avater.jpg" alt="img">
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
                                      <form id="user_edit_form" method="POST" >
                                         @csrf
                                            <div class="account-info">
                                                <h3>Information</h3>
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
    <button type="submit" class="btn edit_btn">
        Update Profile
    </button>
</div>

                                        </form>
                                    </div>
                                </div>
                                <div id="Curriculum" class="tab-pane fade">
                                    <div class="cart-list-area">
                                        <div class="table-responsive">
                                            <table class="table common-table">
                                                <thead data-aos="fade-down">
                                                    <tr>
                                                        <th class="text-center">Product</th>
                                                        <th class="text-center">Price</th>
                                                        <th class="text-center">Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="align-items-center py-3">
                                                        <td>
                                                            <div class="cart-item-thumb d-flex align-items-center gap-4">
                                                                <i class="fas fa-times"></i>
                                                                <img class="w-100" src="assets/img/cart/03.jpg" alt="product">
                                                                <span class="head text-nowrap">Prayer for Meany</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="price-usd">
                                                                $12.40 USD
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="price-usd">
                                                                $12.40 USD
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-items-center py-3">
                                                        <td>
                                                            <div class="cart-item-thumb d-flex align-items-center gap-4">
                                                                <i class="fas fa-times"></i>
                                                                <img class="w-100" src="assets/img/cart/04.jpg" alt="product">
                                                                <span class="head text-nowrap">Don Quixote</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="price-usd">
                                                                $25.50 USD
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="price-usd">
                                                                $25.50 USD
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-items-center py-3">
                                                        <td>
                                                            <div class="cart-item-thumb d-flex align-items-center gap-4">
                                                                <i class="fas fa-times"></i>
                                                                <img class="w-100" src="assets/img/cart/05.jpg" alt="product">
                                                                <span class="head text-nowrap">Don Quixote</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="price-usd">
                                                                $44.50 USD
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="price-usd">
                                                                $44.50 USD
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-items-center py-3">
                                                        <td>
                                                            <div class="cart-item-thumb d-flex align-items-center gap-4">
                                                                <i class="fas fa-times"></i>
                                                                <img class="w-100" src="assets/img/cart/06.jpg" alt="product">
                                                                <span class="head text-nowrap">Don Quixote</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="price-usd">
                                                                $39.50 USD
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="price-usd">
                                                                $39.50 USD
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="Instructors" class="tab-pane fade">
                                    <div class="axil-dashboard-address">
                                        <p class="notice-text">The following addresses will be used on the checkout page by default.</p>
                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <div class="address-info">
                                                    <div class="addrss-header d-flex align-items-center justify-content-between">
                                                        <h4 class="title">Shipping Address</h4>
                                                        <a href="#" class="address-edit"><i class="far fa-edit"></i></a>
                                                    </div>
                                                    <ul class="address-details">
                                                        <li>Name: Annie Mario</li>
                                                        <li>
                                                            <span>Email:</span>
                                                            <a href="mailto:stepforenvironment01@gmail.com">stepforenvironment01@gmail.com</a>
                                                        </li>
                                                        <li>
                                                            <span>Phone:</span>
                                                            <a href="tel:+67041390762">+670 413 90 762</a>
                                                        </li>
                                                        <li class="style-2">7398 Smoke Ranch Road <br>
                                                        Las Vegas, Nevada 89128</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="address-info">
                                                    <div class="addrss-header d-flex align-items-center justify-content-between">
                                                        <h4 class="title">Shipping Address</h4>
                                                        <a href="#" class="address-edit"><i class="far fa-edit"></i></a>
                                                    </div>
                                                    <ul class="address-details">
                                                        <li>Name: Annie Mario</li>
                                                        <li>
                                                            <span>Email:</span>
                                                            <a href="mailto:stepforenvironment01@gmail.com">stepforenvironment01@gmail.com</a>
                                                        </li>
                                                        <li>
                                                            <span>Phone:</span>
                                                            <a href="tel:+67041390762">+670 413 90 762</a>
                                                        </li>
                                                        <li class="style-2">7398 Smoke Ranch Road <br>
                                                        Las Vegas, Nevada 89128</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div id="Reviews" class="tab-pane fade">
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
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

 @include('includes.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   let originalData = $('#user_edit_form').serialize(); // Store original form state

    $('#user_edit_form').on('submit', function(e) {
        e.preventDefault();  // Prevent default form submit

        let currentData = $(this).serialize();

        // Check if any changes were made
        if (originalData === currentData) {
            Swal.fire({
                title: 'No Changes Detected',
                text: 'Please update some fields before submitting.',
                icon: 'info',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Disable the submit button to prevent multiple clicks
        const $submitBtn = $(this).find('button[type="submit"]');
        $submitBtn.prop('disabled', true).text('Updating...');

        $.ajax({
            url: '/user_edit',  // Update this URL to your actual route
            type: 'POST',
            data: $(this).serialize(),  // Serialize form data
            success: function(response) {
                console.log(response);
                
                Swal.fire({
                    title: 'Success!',
                    text: response.message || 'Profile updated successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = '/my-account';  // Redirect after success
                });
            },
            error: function(xhr) {
                console.log("Error: ", xhr);

                var errors = xhr.responseJSON?.errors;
                let errorMessages = "";

                if (errors) {
                    for (var key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errorMessages += errors[key][0] + "\n";
                        }
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
