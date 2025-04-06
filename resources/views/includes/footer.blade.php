  <!-- footer-section Start -->
        <footer class="footer-section footer-bg-2 fix">
            <div class="container">
                <div class="footer-widget-wrapper style-2">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-4 wow fadeInUp" data-wow-delay=".2s">
                            <div class="single-footer-widget">
                                <div class="widget-head">
                                    <a href="index-2.html" class="footer-logo">
                                        <img src="assets/img/logo/white-logo.svg" alt="logo-img">
                                    </a>
                                </div>
                                <div class="footer-content">
                                    <div class="social-item">
                                        <p>
                                            We are a team of designers and developers that create high quality WordPress
                                        </p>
                                        <div class="social-icon style-3 d-flex align-items-center">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            <a href="#"><i class="fa-brands fa-vimeo-v"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 ps-lg-5 wow fadeInUp" data-wow-delay=".4s">
                            <div class="single-footer-widget">
                                <div class="widget-head">
                                    <h3>My Account</h3>
                                </div>
                                <ul class="list-items style-color">
                                    <li>
                                       <a href="{{ url('order') }}">Track Orders</a>
                                    </li>
                                    <li>
                                    <a href="{{ url('product-details') }}">Shipping</a>
                                    </li>
                                    <li>
                                <a href="{{ url('shop-cart') }}">Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('my-account') }}">My Account</a>
                                    </li>
                                    <li>
                                      <a href="{{ url('order') }}">Order History</a>
                                    </li>
                                    <li>
                                      <a href="{{ url('contact') }}">Returns</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                            <div class="single-footer-widget">
                                <div class="widget-head">
                                    <h3>Infomation</h3>
                                </div>
                                <ul class="list-items style-color">
                                    <li>
                                        <a href="contact.html">
                                            Our Story
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact.html">
                                            Careers
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact.html">
                                            Privacy Policy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact.html">
                                            Terms & Conditions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="news-details.html">
                                            Latest News
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact.html">
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 wow fadeInUp" data-wow-delay=".8s">
                            <div class="single-footer-widget">
                                <div class="widget-head">
                                    <h3>Talk To Us</h3>
                                </div>
                                <div class="footer-content">
                                    <div class="text">
                                        <p>Got Questions? Call us</p>
                                        <a href="tel:+67041390762">+670 413 90 762</a>
                                    </div>
                                    <ul class="contact-list">
                                        <li>
                                            <i class="fa-regular fa-envelope"></i>
                                            <a href="mailto:cartly@gmail.com">cartly@gmail.com</a>
                                        </li>
                                        <li>
                                            <i class="fa-regular fa-location-dot"></i>
                                            79 Sleepy Hollow St.<br>
                                            Jamaica, New York 1432
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-wrapper style-2">
                      <p class="wow fadeInUp" data-wow-delay=".3s">
                            ©All Rights reserved | by <span>Ecomas.</span>
                        </p>
                        <div class="bottom-list wow fadeInUp" data-wow-delay=".5s">
                            <div class="app-image">
                             <img src="{{ asset('assets/img/footer/01.png') }}" alt="img">
                            </div>
                            <div class="app-image">
                                 <img src="{{ asset('assets/img/footer/02.png') }}" alt="img">
                            </div>
                            <div class="app-image">
                                 <img src="{{ asset('assets/img/footer/03.png') }}" alt="img">
                            </div>
                            <div class="app-image">
                                 <img src="{{ asset('assets/img/footer/04.png') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Newsletter Modal Area Start-->
        {{-- <div class="modal fade bd-example-modal-lg common-newsletter-modal" id="exampleModal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal1 modal-bg">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="col-lg-12">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-12">
                                    <div class="offer-modal-img d-none d-lg-block">
                               <img src="{{ asset('assets/img/cart/common-modal.jpg') }}" alt="img">

                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-12">
                                    <div class="offer-modal-right">
                                        <h3>Subcribe to Our Newsletter</h3>
                                        <p>Subscribe to our newsletter and Save your <span>20% money</span> with
                                            discount code today.</p>
                                        <form action="#!">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Enter your email">
                                                <div class="input-group-append">
                                                    <button class="theme-btn style6">Subscribe</button>
                                                </div>
                                            </div>
                                            <div class="check-boxed-modal">
                                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                                <label for="vehicle1">Do not show this window</label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div> --}}
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/viewport.jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

    </body>

<!-- Mirrored from ex-coders.com/html/ecomas/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Mar 2025 02:07:17 GMT -->
</html>