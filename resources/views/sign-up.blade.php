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
                            <div class="content">
                                <h2>My account</h2>
                                <ul class="list">
                                    <li>
                                        <a href="index-2.html">Home</a>
                                    </li>
                                    <li>
                                        My account
                                    </li>
                                </ul>
                            </div>
                            <div class="account-box">
                                <h3>Rejister to Sofia.</h3>
                                <h6>Don’t have an account? <span>Create a free account</span></h6>
                                <div class="account-item">
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
                                </div>
                                <p>or Sign in with Email</p>
                                <div class="contact-form-item">
                                    <form action="#" id="contact-form2" method="POST">
                                        <div class="row g-4">
                                            <div class="col-lg-12">
                                                <div class="form-clt">
                                                    <input type="text" name="email" id="email20" placeholder="First name">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-clt">
                                                    <input type="text" name="email" id="email21" placeholder="Last name">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-clt">
                                                    <input type="text" name="subject" id="Password" placeholder="Password">
                                                    <div class="icon">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-clt">
                                                    <input type="text" name="subject" id="password2" placeholder="Confirm Password">
                                                    <div class="icon">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="from-cheak-items">
                                                    <div class="form-check d-flex gap-2 from-customradio">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault11">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Remember Me
                                                        </label>
                                                    </div>
                                                    <span>Forgot Password?</span>
                                                </div>
                                            </div>
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