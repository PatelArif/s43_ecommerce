<style>
    .sb-sidenav-menu .nav-link.active {
    background-color: #008b42; /* replace with your theme color */
    color: #fff;
}
.sb-sidenav-dark .sb-sidenav-menu .nav-link.active {
    color: #fff;
    border-radius: 20px;
    margin: 10px;
}

</style>
<div id="layoutSidenav_nav">
    @php
        $routeName = request()->route()->getName();
        $catOpen = request()->is('admin/allCategories') || request()->is('admin/subCategories');
        $prodOpen = request()->is('admin/products');
        $ordersOpen = request()->is('admin/orders') || request()->is('admin/orders/status/*');
    @endphp

    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                {{-- Core --}}
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link custm_link ajax-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ url('admin/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                {{-- Website Data --}}
                <div class="sb-sidenav-menu-heading">Manage Website Data</div>

                <a class="nav-link custm_link ajax-link {{ request()->is('admin/sliders') ? 'active' : '' }}" href="{{ url('admin/sliders') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                    Manage Sliders
                </a>

                <a class="nav-link custm_link ajax-link {{ request()->is('admin/allUsers') ? 'active' : '' }}" href="{{ url('admin/allUsers') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Website Users
                </a>

                {{-- Categories --}}
                <a class="nav-link collapsed {{ $catOpen ? 'active' : '' }}" href="#" data-bs-toggle="collapse"
                   data-bs-target="#categories" aria-expanded="{{ $catOpen ? 'true' : 'false' }}" aria-controls="categories">
                    <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                    Manage Categories
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                </a>
                <div class="collapse {{ $catOpen ? 'show' : '' }}" id="categories">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link custm_link ajax-link {{ request()->is('admin/allCategories') ? 'active' : '' }}" href="{{ url('admin/allCategories') }}">
                            All Categories
                        </a>
                        <a class="nav-link custm_link ajax-link {{ request()->is('admin/subCategories') ? 'active' : '' }}" href="{{ url('admin/subCategories') }}">
                            Sub Categories
                        </a>
                    </nav>
                </div>

                {{-- Products --}}
                <a class="nav-link collapsed {{ $prodOpen ? 'active' : '' }}" href="#" data-bs-toggle="collapse"
                   data-bs-target="#products" aria-expanded="{{ $prodOpen ? 'true' : 'false' }}" aria-controls="products">
                    <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                    Manage Products
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                </a>
                <div class="collapse {{ $prodOpen ? 'show' : '' }}" id="products">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link custm_link ajax-link {{ request()->is('admin/products') ? 'active' : '' }}" href="{{ url('admin/products') }}">
                            All Products
                        </a>
                    </nav>
                </div>

                {{-- Orders --}}
          @php
                    $ordersOpen = request()->is('admin/orders') || request()->is('admin/orders/status/*');
                    $pendingCount = \App\Models\Order::where('status', 'pending')->count();
                @endphp

                <a class="nav-link collapsed {{ $ordersOpen ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#ordersCollapse" aria-expanded="{{ $ordersOpen ? 'true' : 'false' }}" aria-controls="ordersCollapse">
                    <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                    Orders
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ $ordersOpen ? 'show' : '' }}" id="ordersCollapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav flex-column">
                        <a class="nav-link {{ request()->routeIs('admin.orders.index') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">All Orders</a>
                        <a class="nav-link {{ request()->is('admin/orders/status/pending') ? 'active' : '' }}" href="{{ route('admin.orders.status', 'pending') }}">
                            Pending Orders 
                            @if($pendingCount > 0)
                                <span class="badge bg-danger ms-1">{{ $pendingCount }}</span>
                            @endif
                        </a>
                        <a class="nav-link {{ request()->is('admin/orders/status/approved') ? 'active' : '' }}" href="{{ route('admin.orders.status', 'approved') }}">Approved Orders</a>
                    </nav>
                </div>


                {{-- Contacts --}}
                <a class="nav-link {{ request()->is('admin/contacts') ? 'active' : '' }}" href="{{ url('admin/contacts') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                    Contacts
                </a>

                {{-- Settings --}}
                <a class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    Settings
                </a>

            </div>
        </div>

        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Founder-Smita More
        </div>
    </nav>
</div>
