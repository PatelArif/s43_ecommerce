<div id="layoutSidenav_nav">
   <div id="layoutSidenav_nav">
    @php
        $routeName = request()->route()->getName();
        $catOpen = request()->is('admin/allCategories') || request()->is('admin/subCategories');
        $prodOpen = request()->is('admin/products');
    @endphp

    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <div class="sb-sidenav-menu-heading">Core</div>

                <a class="nav-link custm_link ajax-link  {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ url('admin/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Manage Website Data</div>

                <a class="nav-link custm_link ajax-link {{ request()->is('admin/allUsers') ? 'active' : '' }}" href="{{ url('admin/allUsers') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Website Users
                </a>

                {{-- Manage Categories --}}
                <a class=" no_bg nav-link  collapsed {{ $catOpen ? 'active' : '' }}" href="#" data-bs-toggle="collapse"
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

                {{-- Manage Products --}}
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

                <a class="nav-link {{ request()->is('admin/categories') ? 'active' : '' }}" href="{{ url('admin/categories') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Categories
                </a>

                <a class="nav-link {{ request()->is('admin/orders') ? 'active' : '' }}" href="{{ url('admin/orders') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                    Orders
                </a>

                <a class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}" href="{{ url('admin/settings') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    Settings
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            S4E Admin
        </div>
    </nav>
</div>

</div>