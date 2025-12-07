<form id="user_login_form" method="POST" action="{{ route('login.submit') }}">
    @csrf
    <div class="row g-4">
        <div class="col-lg-12">
            <div class="form-clt">
                <input type="email" name="email" id="email" placeholder="Your Email" required>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-clt position-relative">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span onclick="togglePassword()" style="position:absolute; right:10px; top:15px; cursor:pointer;">👁️</span>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="from-cheak-items d-flex justify-content-between align-items-center">
                <div class="form-check d-flex gap-2">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                <a href="javascript:void(0)" id="forgotPasswordLink">Forgot Password?</a>
            </div>
        </div>
        <div class="col-lg-12">
            <button type="submit" class="theme-btn header-btn w-100">Login</button>
        </div>
    </div>
</form>
<div id="responseMessage" class="text-danger mt-2"></div>
