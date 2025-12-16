@include('includes.head')
@include('includes.header')
<!-- resources/views/auth/reset-password.blade.php -->
<div class="contact-form-item login_section">
    <h3>Reset Password</h3>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ request('email') }}">

        <div class="form-clt">
            <input type="password" name="password" placeholder="New Password" required>
        </div>

        <div class="form-clt">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        </div>

        <button type="submit" class="theme-btn header-btn w-100">Reset Password</button>
    </form>

    @if(session('status'))
        <p class="text-success mt-2">{{ session('status') }}</p>
    @endif

    @error('email')
        <p class="text-danger mt-2">{{ $message }}</p>
    @enderror
</div>
@include('includes.footer')