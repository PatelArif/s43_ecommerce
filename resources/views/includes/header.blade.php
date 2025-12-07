<body>
  <!-- Preloader Start -->
  {{-- 
  <div id="preloader" class="preloader">
    <div class="animation-preloader">
      <div class="spinner">                
      </div>
      <div class="txt-loading">
        <span data-text-preloader="S" class="letters-loading">
        Step
        </span>
        <span data-text-preloader="4" class="letters-loading">
        4
        </span>
        <span data-text-preloader="Environment" class="letters-loading">
        Environment
        </span>
      </div>
      <p class="text-center">Loading</p>
    </div>
    <div class="loader">
      <div class="row">
        <div class="col-3 loader-section section-left">
          <div class="bg"></div>
        </div>
        <div class="col-3 loader-section section-left">
          <div class="bg"></div>
        </div>
        <div class="col-3 loader-section section-right">
          <div class="bg"></div>
        </div>
        <div class="col-3 loader-section section-right">
          <div class="bg"></div>
        </div>
      </div>
    </div>
  </div>
  --}}
  <!-- Back To Top Start -->
  <button id="back-top" class="back-to-top">
  <i class="fa-regular fa-arrow-up"></i>
  </button>
  <!--<< Mouse Cursor Start >>-->  
  {{-- 
  <div class="mouse-cursor cursor-outer"></div>
  <div class="mouse-cursor cursor-inner"></div>
  --}}
  <!-- fix-area Start -->
  <div class="fix-area">
    <div class="offcanvas__info">
      <div class="offcanvas__wrapper">
        <div class="offcanvas__content">
          <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
            <div class="offcanvas__logo"style="max-width:100%">
              <a href="index-2s">
              <img src="assets/img/logo/logo4.png" alt="logo-img"style="max-width:100%">
              </a>
            </div>
            <div class="offcanvas__close">
              <button>
              <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <p class="text d-none d-xl-block">
            {{-- Nullam dignissim, ante scelerisque the  is euismod fermentum odio sem semper the is erat, a feugiat leo urna eget eros. Duis Aenean a imperdiet risus. --}}
          </p>
          <div class="mobile-menu fix mb-3"></div>
          <div class="offcanvas__contact">
            <h4>Contact Info</h4>
            <ul>
              <li class="d-flex align-items-center">
                <div class="offcanvas__contact-icon">
                  <i class="fal fa-map-marker-alt"></i>
                </div>
                <div class="offcanvas__contact-text">
                  <a target="_blank" href="#">Mumbai</a>
                </div>
              </li>
              <li class="d-flex align-items-center">
                <div class="offcanvas__contact-icon mr-15">
                  <i class="fal fa-envelope"></i>
                </div>
                <div class="offcanvas__contact-text">
                  <a href="mailto:stepforenvironment01@gmail.com">
                  <span class="mailto:stepforenvironment01@gmail.com">stepforenvironment01@gmail.com</span></a>
                </div>
              </li>
              <li class="d-flex align-items-center">
                <div class="offcanvas__contact-icon mr-15">
                  <i class="fal fa-clock"></i>
                </div>
                <div class="offcanvas__contact-text">
                  <a target="_blank" href="#">Mon-Sat, 09:00 AM -05:00 PM</a>
                </div>
              </li>
              <li class="d-flex align-items-center">
                <div class="offcanvas__contact-icon mr-15">
                  <i class="far fa-phone"></i>
                </div>
                <div class="offcanvas__contact-text">
                  <a href="tel:+91 9867970493">+91 9867970493</a>
                </div>
              </li>
            </ul>
            <div class="header-button mt-4">
            </div>
            {{-- <a href="contact.html" class="theme-btn"><span>Let’s Talk <i class="fa-solid fa-arrow-right"></i></span></a>
            <div class="social-icon d-flex align-items-center">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="offcanvas__overlay"></div>
  <!-- Header bottom Start -->
  <div class="header-bottom-section">
    <div class="container">
      <div class="header-bottom-wrapper">
        <ul class="contact-list">
          <li>
            <i class="fa-solid fa-phone"></i>
            <a href="tel:+91 9867970493">9867970493</a>
          </li>
          <li>
            <i class="fa-solid fa-envelope"></i>
            <a href="mailto:stepforenvironment01@gmail.com">stepforenvironment01@gmail.com</a>
          </li>
        </ul>
        <p>
          {{-- <span class="color">Get upto 50%</span> off On Every Purchase!  <span>Shop Now</span> --}}
        </p>
        <div class="flag-wrap">
          <div class="content">
            @auth
            <button  class="account-text d-flex align-items-center gap-2">
            <a href="{{url('/my-account')}}" class=""><i class="fa-regular fa-user "></i>
            {{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}</a>
            </button>
            @else
            <button class="account-text d-flex align-items-center gap-2">
            <a href="{{url('/login')}}" class=""><i class="fa-regular fa-user "></i>
            Login / Register
            </a>
            </button>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('includes/navbar')
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