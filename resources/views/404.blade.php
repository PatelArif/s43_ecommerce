@include('includes.head')
@include('includes.header')
 <!-- search-wrap Start -->
        <div class="search-wrap">
            <div class="search-inner">
                <i class="fas fa-times search-close" id="search-close"></i>
                <div class="search-cell">
                    <form method="get">
                        <div class="search-field-holder">
                            <input type="search" class="main-search-input" placeholder="Search...">
                        </div>
                    </form>
                </div>
            </div>
        </div>

         <!-- Error-Section Start -->
         <section class="Error-section section-padding fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="error-items">
                            <div class="error-image wow fadeInUp" data-wow-delay=".3s">
                                <img src="{{config('constants.ASSETS_PATH') }}img/404.png" alt="img">
                            </div>
                            <h2 class="wow fadeInUp" data-wow-delay=".5s">
                                <span>Oops!</span> Page not found
                            </h2>
                            <p class="wow fadeInUp" data-wow-delay=".7s">The page you are looking for does not exist</p>
                            <a href="index-2.html" class="theme-btn wow fadeInUp" data-wow-delay=".3s">
                                Back to Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       @include('includes.footer')
