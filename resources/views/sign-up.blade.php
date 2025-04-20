@include('includes.head')
@include('includes.header')

         <!-- Shop-categories-Section Start -->
        <section class="sign-up-section section-padding fix">
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
                                        Sign in
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="account-box">
                                <h3>Looks like you're new here!</h3>
                               
                                {{-- <div class="account-item">
                                    <div class="google-image">
                                        <img src="assets/img/google.png" alt="img">
                                        <h6>Sign in with google</h6>
                                    </div>
                                    <div class="facebook">
                                        <i class="fa-brands fa-facebook"></i>
                                    </div>
                                    <div class="apple">
                                        <i class="fa-brands fa-apple"></i>
                                    </div>
                                </div> --}}
                                <p>Create a free Account</p>

                            <div class="contact-form-item">
                                 <form id="contact-form2" method="POST" action="{{ url('signup') }}">
    @csrf
                                       <div class="row g-4">
                                                <!-- First Name -->
                                                <div class="col-lg-12">
                                                    <div class="form-clt">
                                                        <input type="text" name="first_name" id="first_name" placeholder="First name">
                                                    </div>
                                                </div>

                                                <!-- Last Name -->
                                                <div class="col-lg-12">
                                                    <div class="form-clt">
                                                        <input type="text" name="last_name" id="last_name" placeholder="Last name">
                                                    </div>
                                                </div>
                                                     <!-- Email Name -->
                                                <div class="col-lg-12">
                                                    <div class="form-clt">
                                                        <input type="email" name="email" id="email" placeholder="Email Address">
                                                    </div>
                                                </div>

                                                <!-- Mobile Number -->
                                                <div class="col-lg-12">
                                                    <div class="form-clt">
                                                        <input type="number" name="mobile" id="mobile" placeholder="Mobile Number">
                                                    </div>
                                                </div>

                                                <!-- Password -->
                                                <div class="col-lg-12">
                                                    <div class="form-clt">
                                                        
                                                        <input type="password" name="password" onfocusout="return myfun()" id="loginPassword" placeholder="Password">
                                                        <div class="icon">
                                                           <span id="toggle-password" toggle="#loginPassword" class="field-icon fa fa-eye toggle-password"onclick="showpw()"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Confirm Password -->
                                                <div class="col-lg-12">
                                                    <div class="form-clt">
                                                        <input type="password" name="password_confirmation" onfocusout="return myfun()" id="password_confirmation" placeholder="Confirm Password">
                                                        <div class="icon">
                                                            <span id="toggle-con-password" toggle="#password_confirmation"class="field-icon fa fa-eye toggle-con-password" onclick="showconfirmpw()"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Remember Me / Forgot Password -->
                                                <div class="col-lg-12">
                                                    <div class="from-cheak-items">
                                                        <div class="form-check d-flex gap-2 from-customradio">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault11">
                                                            <label class="form-check-label" for="flexRadioDefault11">
                                                                Remember Me
                                                            </label>
                                                        </div>
                                                        <span>Forgot Password?</span>
                                                    </div>
                                                </div>

                                            <!-- Submit -->
                                            <div class="col-lg-12">
                                                <button type="submit" class="theme-btn w-100">
                                                    Sign Up
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
    
   $('#contact-form2').on('submit', function(e) {
    e.preventDefault();  // Prevent the default form submission
    
    $.ajax({
        url: '/signup',  // Your API endpoint
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
