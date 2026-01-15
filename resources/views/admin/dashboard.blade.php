@extends('admin.layout.admin')

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
@endsection
