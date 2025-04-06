@include('includes.head')
@include('includes.header')
         <!-- contact-us-Section Start -->
        <section class="contact-us-section section-padding fix">
            <div class="container">
                <div class="conatct-main-wrapper">
                    <div class="content">
                        <h2>Keep In Touch with Us</h2>
                        <ul class="list">
                            <li>
                                <a href="index-2.html">Home</a>
                            </li>
                            <li>
                                Contact
                            </li>
                        </ul>
                    </div>
                    <div class="contact-box-wrapper">
                        <div class="row g-4">
                            <div class="col-lg-8">
                                <div class="comment-form-wrap">
                                    <h3>Sent A Message</h3>
                                    <form action="https://ex-coders.com/html/ecomas/contact.php" id="contact-form2" method="POST">
                                        <div class="row g-4">
                                            <div class="col-lg-12">
                                                <div class="form-clt">
                                                    <input type="text" name="name" id="name" placeholder="Your Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-clt">
                                                    <input type="text" name="email" id="email20" placeholder="Email address">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-clt">
                                                    <div class="form">
                                                        <select class="single-select w-100">
                                                            <option> Subject</option>
                                                            <option>  Subject-1</option>
                                                            <option> Subject-2</option>
                                                            <option> Subject-3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-clt">
                                                    <textarea name="message" id="message" placeholder="Type your message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="from-cheak-items">
                                                    <div class="form-check d-flex gap-2 from-customradio">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Save my name, email, and website in this browser for the next time I comment.
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="theme-btn">
                                                    Post Comment
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="contact-right">
                                    <div class="contact-item">
                                        <div class="icon">
                                            <i class="fa-thin fa-comments"></i>
                                        </div>
                                        <div class="content">
                                            <h6>
                                                <a href="mailto:contact@support.com">
                                                    contact@support.com
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="contact-item">
                                        <div class="icon">
                                            <i class="fa-thin fa-location-pin"></i>
                                        </div>
                                        <div class="content">
                                            <h6>
                                                84 sleepy hollow st. <br>
                                                jamaica, New York 1432
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="contact-item mb-0">
                                        <div class="icon">
                                            <i class="fa-thin fa-share-nodes"></i>
                                        </div>
                                        <div class="content">
                                            <h6>
                                                Find on social media
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="social-icon d-flex align-items-center">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="bg-2"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <!-- map-Section Start -->
        <div class="map-section section-padding pt-0">
            <div class="container">
                <div class="map-items">
                    <div class="googpemap">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6678.7619084840835!2d144.9618311901502!3d-37.81450084255415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b4758afc1d%3A0x3119cc820fdfc62e!2sEnvato!5e0!3m2!1sen!2sbd!4v1641984054261!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>

@include('includes.footer')
     