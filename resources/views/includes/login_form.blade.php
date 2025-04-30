            <form id="user_login_form" method="POST" action="{{ url('login.submit') }}">
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