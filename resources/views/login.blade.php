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

<section class="contact-us-section bg-custm contact-padding fix position-relative">
    <div id="particles-js" class="particles"></div>
    <div class="container-fluid">
        <div class="conatct-main-wrapper">
            <div class="content p-5">
                <h2>Welcome Back</h2>
            </div>
        </div>
    </div>
</section>
         <!-- Shop-categories-Section Start -->
        <section class="my-account-section section-padding fix">
            <div class="container">
                <div class="account-wrapper">
                    <div class="shape-1 float-bob-x">
                        <img src="{{config('constants.ASSETS_PATH') }}img/shape-1.png" alt="img">
                    </div>
                    <div class="shape-2 float-bob-y">
                        <img src="{{config('constants.ASSETS_PATH') }}img/shape-2.png" alt="img">
                    </div>
                    <div class="shape-3 float-bob-y">
                        <img src="{{config('constants.ASSETS_PATH') }}img/dot.png" alt="img">
                    </div>
                    <div class="shape-4 float-bob-x">
                        <img src="{{config('constants.ASSETS_PATH') }}img/shape-3.png" alt="img">
                    </div>
                    <div class="shape-5 float-bob-y">
                        <img src="{{config('constants.ASSETS_PATH') }}img/man-shape.png" alt="img">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                      <div class="account-box ">
                        <h3 class="login_section main-heading">Login to Your Account</h3>
                  <h5 class="login_section sub-heading">
    Don’t have an account? 
    <a href="{{ url('/register') }}" class="register-link">Create a free account</a>
</h5>
                        <div class="account-item">
                            <div class="contact-form-item login_section">
                                @include('includes/login_form')
                            </div>

                            <div class="contact-form-item mt-0 forgotPasswordSection d-none">
                                @include('includes/forgot-password')
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </section>

       @include('includes.footer')
<script>
    $(document).ready(function () {
    // When Forgot Password is clicked
    $(document).on("click", ".forgot-password-link", function(e) {
        e.preventDefault();
        $(".login_section").addClass("d-none");
        $(".forgotPasswordSection").removeClass("d-none");
        $(".main-heading").text("Forgot Password");
        $(".sub-heading").html(
            'Remember your password? <a href="#" class="back-to-login">Login</a>'
        );
    });

    // When Back to Login is clicked
    $(document).on("click", ".back-to-login", function(e) {
        e.preventDefault();
        $(".forgotPasswordSection").addClass("d-none");
        $(".login_section").removeClass("d-none");
        $(".main-heading").text("Login");
        $(".sub-heading").html(
            'Don’t have an account? <a href="{{ url('/register') }}">Create a free account</a>'
        );
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

