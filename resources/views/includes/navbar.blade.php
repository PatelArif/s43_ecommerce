<!-- Header Section Start -->
<header id="header-sticky" class="header-1 header-2">
    <div class="container">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="logo">
                    <a href="{{ url('/') }}" class="header-logo">
                        <img src="{{ asset('assets/img/logo/main_logo2.png') }}" alt="logo-img">
                    </a>
                    <a href="{{ url('/') }}" class="header-logo-2 d-none">
                        <img src="{{ asset('assets/img/logo/main_logo2.png') }}" alt="logo-img">
                    </a>
                </div>
                <div class="mean__menu-wrapper">
                    <div class="main-menu">
                        <nav id="mobile-menu" style="display: block;">
                            <ul>
                                <li class="has-dropdown active menu-thumb">
                                    <a href="{{ url('/') }}">
                                        Home
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </a>
                                    <ul class="submenu has-homemenu">
                                        <li>
                                            <div class="homemenu-items">
                                                <div class="homemenu">
                                                    <div class="homemenu-thumb">
                                                        <img src="{{ asset('assets/img/header/home-1.jpg') }}" alt="img">
                                                        <div class="demo-button">
                                                            <a href="{{ url('/') }}" class="theme-btn">Demo Page</a>
                                                        </div>
                                                    </div>
                                                    <div class="homemenu-content text-center">
                                                        <h4 class="homemenu-title">Home 01</h4>
                                                    </div>
                                                </div>
                                                <div class="homemenu">
                                                    <div class="homemenu-thumb mb-15">
                                                        <img src="{{ asset('assets/img/header/home-2.jpg') }}" alt="img">
                                                        <div class="demo-button">
                                                            <a href="{{ url('/index-3') }}" class="theme-btn">Demo Page</a>
                                                        </div>
                                                    </div>
                                                    <div class="homemenu-content text-center">
                                                        <h4 class="homemenu-title">Home 02</h4>
                                                    </div>
                                                </div>
                                                <div class="homemenu">
                                                    <div class="homemenu-thumb mb-15">
                                                        <img src="{{ asset('assets/img/header/home-3.jpg') }}" alt="img">
                                                        <div class="demo-button">
                                                            <a href="{{ url('/index-4') }}" class="theme-btn">Demo Page</a>
                                                        </div>
                                                    </div>
                                                    <div class="homemenu-content text-center">
                                                        <h4 class="homemenu-title">Home 03</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-dropdown active d-xl-none">
                                    <a href="{{ url('/') }}" class="border-none">Home</a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('/') }}">Home 01</a></li>
                                        <li><a href="{{ url('/index-3') }}">Home 02</a></li>
                                        <li><a href="{{ url('/index-4') }}">Home 03</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown">
                                    <a href="{{ url('/news-details') }}">
                                        Pages
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('/about') }}">About Us</a></li>
                                        <li><a href="{{ url('/order') }}">Track Your Order</a></li>
                                        <li><a href="{{ url('/login') }}">Login</a></li>
                                        <li><a href="{{ url('/sign-up') }}">Sign-Up</a></li>
                                        <li><a href="{{ url('/categories') }}">Categories</a></li>
                                        <li><a href="{{ url('/coming-soon') }}">Coming Soon</a></li>
                                        <li><a href="{{ url('/forget-password') }}">Forget Password</a></li>
                                        <li><a href="{{ url('/my-account') }}">My Account</a></li>
                                        <li><a href="{{ url('/faq') }}">FAQ</a></li>
                                        <li><a href="{{ url('/404') }}">404</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ url('/product-details') }}">
                                        Shop
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('/shop-grid') }}">Shop Grid</a></li>
                                        <li><a href="{{ url('/shop-left-sidebar') }}">Shop Left Sidebar</a></li>
                                        <li><a href="{{ url('/shop-right-sidebar') }}">Shop Right Sidebar</a></li>
                                        <li><a href="{{ url('/shop-cart') }}">Shop Cart</a></li>
                                        <li><a href="{{ url('/checkout') }}">Checkout</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ url('/news-details') }}">
                                        Blog
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('/news-grid') }}">Blog Grid</a></li>
                                        <li><a href="{{ url('/news-list') }}">Blog List</a></li>
                                        <li><a href="{{ url('/news-details') }}">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ url('/contact') }}">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header-right d-flex justify-content-end align-items-center">
                    <a href="#0" class="search-trigger search-icon"><i class="fa-regular fa-magnifying-glass"></i></a>
                    <ul class="header-icon">
                        <li>
                            <a href="#"><i class="fa-regular fa-heart"></i><span class="number">0</span></a>
                        </li>
                    </ul>
                    <div class="menu-cart style-3">
                        <div class="cart-box">
                            <ul>
                                <li>
                                    <img src="{{ asset('assets/img/cart/01.jpg') }}" alt="image">
                                    <div class="cart-product">
                                        <a href="#">Android phone</a>
                                        <span>118$</span>
                                    </div>
                                </li>
                            </ul>
                            <ul>
                                <li class="border-none">
                                    <img src="{{ asset('assets/img/cart/02.jpg') }}" alt="image">
                                    <div class="cart-product">
                                        <a href="#">Macbook Book</a>
                                        <span>268$</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="shopping-items">
                                <span>Total :</span>
                                <span>$386.00</span>
                            </div>
                            <div class="cart-button mb-4">
                                <a href="{{ url('/shop-cart') }}" class="theme-btn">
                                    View Cart
                                </a>
                            </div>
                        </div>
                        <a href="{{ url('/shop-cart') }}" class="cart-icon style-2">
                            <i class="fa-sharp fa-regular fa-bag-shopping"></i>
                        </a>
                    </div>
                    <div class="header__hamburger d-xl-none my-auto">
                        <div class="sidebar__toggle">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
