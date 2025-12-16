@push('title')
    <title>S4E Admin Dashboard</title>
@endpush

@include('admin.includes.header')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .dashboard-card {
        border-radius: 16px;
        transition: .25s;
        cursor: pointer;
    }

    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, .25);
    }

    .section-title {
        font-size: 14px;
        font-weight: 600;
        color: #6c757d;
        margin: 40px 0 15px;
        text-transform: uppercase;
    }

    .dashboard-card {
        border-radius: 16px;
        transition: .25s;
        cursor: pointer;
        min-height: 90px;
        /* ⬇ reduced */
    }

    .dashboard-card .card-body {
        padding: 12px 16px;
        /* ⬇ compact */
    }

    .dashboard-card h4,
    .dashboard-card h2 {
        margin: 6px 0 0;
        font-weight: 700;
    }

    #orderChart {
        max-height: 210px !important;
    }
</style>

<div id="layoutSidenav">
    @include('admin.includes.sidebar')

    <div id="layoutSidenav_content">
        <main class="container-fluid px-4">

            <h1 class="mt-4">Dashboard</h1>

            {{-- 🔔 Notification --}}
            @if ($pendingOrders > 0)
                <div class="alert alert-warning">
                    ⚠️ {{ $pendingOrders }} pending orders need attention
                </div>
            @endif
            {{-- ================= WEBSITE MANAGEMENT ================= --}}
            <div class="section-title">Website Management</div>

            <div class="row g-4">

                {{-- Products --}}
                <div class="col-xl-2 col-md-6">
                    <a href="{{ route('products.index') }}" class="text-decoration-none">
                        <div class="card bg-success text-white dashboard-card">
                            <div class="card-body">
                                <small>Products</small>
                                <h4>{{ $productCount }}</h4>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Categories --}}
                <div class="col-xl-2 col-md-6">
                    <a href="{{ route('categories.index') }}" class="text-decoration-none">
                        <div class="card bg-primary text-white dashboard-card">
                            <div class="card-body">
                                <small>Categories</small>
                                <h4>{{ $categoryCount }}</h4>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Sub Categories --}}
                <div class="col-xl-2 col-md-6">
                    <a href="{{ route('subCategories.index') }}" class="text-decoration-none">
                        <div class="card bg-warning text-white dashboard-card">
                            <div class="card-body">
                                <small>Sub Categories</small>
                                <h4>{{ $subCategoryCount }}</h4>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Users --}}
                <div class="col-xl-2 col-md-6">
                    <a href="{{ route('admin.allUsers') }}" class="text-decoration-none">
                        <div class="card bg-danger text-white dashboard-card">
                            <div class="card-body">
                                <small>Users</small>
                                <h4>{{ $userCount }}</h4>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- Sliders --}}
                <div class="col-xl-2 col-md-6">
                    <a href="{{ route('sliders.index') }}" class="text-decoration-none">
                        <div class="card bg-secondary text-white dashboard-card">
                            <div class="card-body">
                                <small>Sliders</small>
                                <h4>{{ $slider }}</h4>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            {{-- ================= ORDERS SUMMARY ================= --}}
            <div class="section-title">Orders Summary</div>
            <div class="row g-4">

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-dark text-white dashboard-card">
                        <div class="card-body">
                            <small>Total Orders</small>
                            <h4>{{ $totalOrders }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white dashboard-card">
                        <div class="card-body">
                            <small>Pending</small>
                            <h4>{{ $pendingOrders }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white dashboard-card">
                        <div class="card-body">
                            <small>Approved</small>
                            <h4>{{ $approvedOrders }}</h4>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white dashboard-card">
                        <div class="card-body">
                            <small>Dispatched</small>
                            <h4>{{ $dispatchedOrders }}</h4>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ================= CHART + REVENUE ================= --}}
            <div class="row mt-4 g-4">

                <div class="col-xl-4">
                    <div class="card bg-success text-white shadow-sm">
                        <div class="card-body">
                            <small>Today Revenue</small>
                            <h2>₹{{ number_format($todayRevenue, 2) }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card bg-dark text-white shadow-sm">
                        <div class="card-body">
                            <small>Total Revenue</small>
                            <h2>₹{{ number_format($totalRevenue, 2) }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card shadow-sm">
                        <div class="card-header fw-bold">Order Status</div>
                        <div class="card-body">
                            <canvas id="orderChart"></canvas>
                        </div>
                    </div>
                </div>


            </div>

        </main>
        <script>
            new Chart(document.getElementById('orderChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Pending', 'Approved', 'Dispatched', 'Delivered'],
                    datasets: [{
                        data: [
                            {{ $pendingOrders }},
                            {{ $approvedOrders }},
                            {{ $dispatchedOrders }},
                            {{ $deliveredOrders }}
                        ],
                        backgroundColor: ['#ffc107', '#28a745', '#17a2b8', '#0d6efd']
                    }]
                },
                options: {
                    cutout: '70%',
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        </script>

        @include('admin.includes.footer')
    </div>
</div>
