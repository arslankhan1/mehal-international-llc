{{-- @extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="row">
        <!-- Stats Cards -->
        <div class="col-md-4">
            <div class="stat-card">
                <i class="fas fa-box fa-2x text-primary mb-3"></i>
                <p class="text-muted">Total Products</p>
                <h3>{{ $stats['total_products'] }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <i class="fas fa-tag fa-2x text-success mb-3"></i>
                <p class="text-muted">Total Brands</p>
                <h3>{{ $stats['total_brands'] }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <i class="fas fa-shopping-cart fa-2x text-warning mb-3"></i>
                <p class="text-muted">Total Orders</p>
                <h3>{{ $stats['total_orders'] }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <i class="fas fa-clock fa-2x text-info mb-3"></i>
                <p class="text-muted">Pending Orders</p>
                <h3>{{ $stats['pending_orders'] }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <i class="fas fa-users fa-2x text-secondary mb-3"></i>
                <p class="text-muted">Total Customers</p>
                <h3>{{ $stats['total_customers'] }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <i class="fas fa-dollar-sign fa-2x text-success mb-3"></i>
                <p class="text-muted">Total Revenue</p>
                <h3>${{ number_format($stats['total_revenue'], 2) }}</h3>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="table-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0"><i class="fas fa-shopping-cart"></i> Recent Orders</h5>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_orders as $order)
                                <tr>
                                    <td><strong>{{ $order->order_number }}</strong></td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>${{ number_format($order->total, 2) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $order->status === 'pending' ? 'warning' : 'success' }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No orders yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Low Stock Products -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="table-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0"><i class="fas fa-exclamation-triangle text-danger"></i> Low Stock Products</h5>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Brand</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($low_stock_products as $product)
                                <tr>
                                    <td>{{ Str::limit($product->name, 50) }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>
                                        <span class="badge bg-{{ $product->stock === 0 ? 'danger' : 'warning' }}">
                                            {{ $product->stock }} units
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-{{ $product->status }}">{{ ucfirst($product->status) }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.products.edit', $product) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">All products are in stock</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Dashboard</h1>

        <!-- Statistics Cards -->
        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                                <i class="fas fa-box fa-2x"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Total Products</h6>
                                <h3 class="mb-0">{{ $stats['total_products'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stat-card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-success bg-opacity-10 text-success rounded-3 p-3">
                                <i class="fas fa-tag fa-2x"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Total Brands</h6>
                                <h3 class="mb-0">{{ $stats['total_brands'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stat-card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                                <i class="fas fa-shopping-cart fa-2x"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Total Orders</h6>
                                <h3 class="mb-0">{{ $stats['total_orders'] }}</h3>
                                <small class="text-warning">{{ $stats['pending_orders'] }} pending</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card stat-card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-info bg-opacity-10 text-info rounded-3 p-3">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Total Customers</h6>
                                <h3 class="mb-0">{{ $stats['total_customers'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Revenue Card -->
        <div class="row g-4 mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-success bg-opacity-10 text-success rounded-3 p-3">
                                <i class="fas fa-dollar-sign fa-2x"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-muted mb-1">Total Revenue</h6>
                                <h2 class="mb-0 text-success">${{ number_format($stats['total_revenue'], 2) }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Recent Orders -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Recent Orders</h5>
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-primary">
                                View All
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Order #</th>
                                        <th>Customer</th>
                                        <th>Items</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recent_orders as $order)
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.orders.show', $order) }}"
                                                    class="text-decoration-none">
                                                    <strong>{{ $order->order_number }}</strong>
                                                </a>
                                            </td>
                                            <td>{{ $order->customer_name }}</td>
                                            <td>{{ $order->items->sum('quantity') }}</td>
                                            <td><strong>${{ number_format($order->total, 2) }}</strong></td>
                                            <td>
                                                <span class="badge bg-{{ $order->status_color }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4 text-muted">
                                                No orders yet
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Low Stock Products -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Low Stock Alert</h5>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-primary">
                                View All
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @forelse($low_stock_products as $product)
                                <div class="list-group-item">
                                    <div class="d-flex align-items-center">
                                        @if ($product->images->count() > 0)
                                            <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                                alt="{{ $product->name }}" class="rounded"
                                                style="width: 40px; height: 40px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                                style="width: 40px; height: 40px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-0">{{ Str::limit($product->name, 30) }}</h6>
                                            <small class="text-muted">{{ $product->brand->name }}</small>
                                        </div>
                                        <span class="badge bg-danger">{{ $product->stock }}</span>
                                    </div>
                                </div>
                            @empty
                                <div class="list-group-item text-center py-4 text-muted">
                                    All products in stock
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .stat-card {
            transition: transform 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            min-width: 60px;
            min-height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection
