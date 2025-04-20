@include('includes.head')
@include('includes.header')
@if (session('logout_success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Logged Out',
    text: '{{ session('logout_success') }}',
    confirmButtonText: 'OK',
    customClass: {
        confirmButton: 'swal-confirm-button'
    }
});
</script>

@endif
<style>
.nice-select {
 display: none;
}div:where(.swal2-container) button:where(.swal2-styled):where(.swal2-confirm) {
   background-color: #4f6d44;
}
</style>
         <!-- Shop-categories-Section Start -->
        <section class="my-account-section section-padding fix">
            <div class="container">
                <div class="account-wrapper">
                    <div class="shape-1 float-bob-x">
                        <img src="assets/img/shape-1.png" alt="img">
                    </div>
                    <div class="shape-2 float-bob-y">
                        <img src="assets/img/shape-2.png" alt="img">
                    </div>
                    <div class="shape-3 float-bob-y">
                        <img src="assets/img/dot.png" alt="img">
                    </div>
                    <div class="shape-4 float-bob-x">
                        <img src="assets/img/shape-3.png" alt="img">
                    </div>
                    <div class="shape-5 float-bob-y">
                        <img src="assets/img/man-shape.png" alt="img">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="content mb-3">
                                <h2>My account</h2>
                                <ul class="list">
                                    <li>
                                        <a href="{{url('/')}}">Home</a>
                                    </li>
                                    <li>
                                        My account
                                    </li>
                                </ul>
                            </div>
                            <div class="account-box">
                                <h3>Login</h3>
                                <h6>Don’t have an account? <span>Create a free account</span></h6>
                                <div class="account-item">
                                   
                                <div class="contact-form-item">
                               <form id="user_login_form" method="POST">
                                         @csrf
                                        <div class="row g-4">
                                            <div class="col-lg-12">
                                                <div class="form-clt">
                                                    <input type="text" name="email" id="email20" placeholder="Your Email" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-clt">
                                                    <input type="password" name="password" id="password" placeholder="Password"required>
                                                    <span onclick="togglePassword()" style="position:absolute; right:10px; top:15px; cursor:pointer;">👁️</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="from-cheak-items">
                                                    <div class="form-check d-flex gap-2 from-customradio">
                                                        <input class="form-check-input" type="radio"  name="remember"id="flexRadioDefault2">
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
                </div>
            </div>
        </section>

       @include('includes.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    
   $('#user_login_form').on('submit', function(e) {
    e.preventDefault();  // Prevent the default form submission
    
    $.ajax({
        url: '/login',  // Your API endpoint
        type: 'POST',
        data: $(this).serialize(),  // Serialize the form data to send in the request
        success: function(response) {
            console.log(response);  // Log the response to check if it's correct
            Swal.fire({
                title: 'Success!',
                text: response.message,
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '/my-account';  // Redirect to another page after success
            });
        },
        error: function(xhr, status, error) {
            // Log the error for debugging
            console.log("Error: ", error);
            
            var errors = xhr.responseJSON.errors;  // Get errors from the response

            // Loop through errors and show them in SweetAlert
            if (errors) {
                var errorMessages = "";
                for (var key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        errorMessages += errors[key][0] + "\n";  // Add each error message to the string
                    }
                }
                
                Swal.fire({
                    title: 'Error!',
                    text: errorMessages,  // Display all error messages in the alert
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            } else {
                // If no specific errors, show a generic error
                Swal.fire({
                    title: 'Error!',
                    text: 'An unexpected error occurred. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }
    });
});

</script>