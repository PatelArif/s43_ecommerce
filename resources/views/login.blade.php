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
                                              @include('includes/login_form')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       @include('includes.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

