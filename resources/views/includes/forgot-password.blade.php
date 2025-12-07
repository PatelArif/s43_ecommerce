<div class="contact-form-item  mt-0 forgotPasswordSection">
    <h3 class="text-center mb-4">Forgot Password</h3>
    
    <form id="forgot_password_form" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="form-clt">
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                @error('email')
                    <p class="text-danger small mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-lg-12">
                <button type="submit" class="theme-btn header-btn w-100">
                    <i class="fa fa-envelope me-2"></i> Send Reset Link
                </button>
            </div>

            <div class="col-lg-12 text-center">
                <a href="javascript:void(0)" id="backToLogin" class="text-decoration-none">
                    <i class="fa fa-arrow-left me-1"></i> Back to Login
                </a>
            </div>
        </div>
    </form>

    @if(session('status'))
        <p class="text-success text-center mt-3">{{ session('status') }}</p>
    @endif
</div>
