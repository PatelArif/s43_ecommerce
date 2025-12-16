<!-- Header Section Start -->
<header id="header-sticky" class="header-1 header-2">
    <div class="container">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="logo" style="width:70px">
                    <a href="{{ url('/') }}" class="header-logo"style="width:70px">
                        <img src="{{ asset(config('constants.ASSETS_PATH') . 'img/logo/logo4.png') }}"
                            alt="logo-img"style="width:70px">
                    </a>
                    <a href="{{ url('/') }}" class="header-logo-2 d-none">
                        <img src="{{ asset(config('constants.ASSETS_PATH') . 'img/logo/logo4.png') }}"
                            alt="logo-img"style="width:70px">
                    </a>
                </div>
                <div class="mean__menu-wrapper">
                    <div class="main-menu">
                        <nav id="mobile-menu" style="display: block;">
                            <ul>
                                <li>
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ url('/about') }}">About Us</a>
                                </li>
                                <li class="has-dropdown active d-xl-none">
                                    <a href="{{ url('/') }}" class="border-none">Home</a>
                                </li>
                                <li class="has-dropdown">
                                    <a href="#">
                                        Pages
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </a>

                                    <ul class="submenu">

                                        @guest('web')
                                            <li><a href="{{ url('/login') }}">Login</a></li>
                                            <li><a href="{{ url('/register') }}">Sign-Up</a></li>
                                        @endguest

                                        @auth('web')
                                            <li><a href="{{ url('/my-account') }}">My Account</a></li>
                                            <li><a href="{{ url('/my-orders') }}">Track Your Order</a></li>
                                        @endauth

                                    </ul>
                                </li>

                                <li>
                                    <a href="{{ url('#') }}">
                                        Categories
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('/allCategories') }}">All Categories</a></li>
                                        <li><a href="{{ url('/shop-cart') }}">Shop Cart</a></li>
                                        <li><a href="{{ url('/checkout') }}">Checkout</a></li>
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
                    <ul class="header-icon">
                        <li>
                            <a href="{{ route('favorites.view') }}" id="favorites-link">
                                <i class="fa-regular fa-heart"></i>
                                <span id="favorites-count" class="number">{{ count($globalFavorites) }}</span>
                            </a>
                        </li>
                    </ul>
                    <div class="menu-cart style-3 position-relative">
                        <a href="{{ route('cart') }}" class="cart-link position-relative">
                            <i class="fa-sharp fa-regular fa-bag-shopping"></i>
                            <span id="cart-count-badge" class="cart-count-badge">{{ count($globalCart) }}</span>
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
