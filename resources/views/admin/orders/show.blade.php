@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Order Details</h1>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Back to Orders
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Order Header -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Order #{{ $order->order_number }}</h4>
                        <p class="text-muted mb-0">Placed on {{ $order->created_at->format('M d, Y h:i A') }}</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <span class="badge bg-{{ $order->status_color }} fs-6 me-2">{{ ucfirst($order->status) }}</span>
                        <span
                            class="badge bg-{{ $order->payment_status_color }} fs-6">{{ ucfirst($order->payment_status) }}</span>
                        <div class="mt-2">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#updateStatusModal">
                                <i class="fas fa-edit"></i> Update Status
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Order Items -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Order Items</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if ($item->product && $item->product->images->count() > 0)
                                                        <img src="{{ asset('storage/' . $item->product->images->first()->image_path) }}"
                                                            alt="{{ $item->product_name }}" class="rounded me-3"
                                                            style="width: 60px; height: 60px; object-fit: cover;">
                                                    @endif
                                                    <div>
                                                        <strong>{{ $item->product_name }}</strong>
                                                        @if ($item->product)
                                                            <br>
                                                            <small class="text-muted">SKU:
                                                                {{ $item->product->sku }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>${{ number_format($item->price, 2) }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td><strong>${{ number_format($item->total, 2) }}</strong></td>
                                        </tr>
                                    @endforeach
                                    <tr class="table-light">
                                        <td colspan="3" class="text-end"><strong>Subtotal:</strong></td>
                                        <td><strong>${{ number_format($order->subtotal, 2) }}</strong></td>
                                    </tr>
                                    <tr class="table-light">
                                        <td colspan="3" class="text-end"><strong>Shipping:</strong></td>
                                        <td><strong>${{ number_format($order->shipping, 2) }}</strong></td>
                                    </tr>
                                    <tr class="table-light">
                                        <td colspan="3" class="text-end"><strong>Tax:</strong></td>
                                        <td><strong>${{ number_format($order->tax, 2) }}</strong></td>
                                    </tr>
                                    <tr class="table-success">
                                        <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                        <td><strong class="text-success">${{ number_format($order->total, 2) }}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Information -->
            <div class="col-lg-4">
                <!-- Customer Information -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Customer Information</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-2"><strong>Name:</strong> {{ $order->customer_name }}</p>
                        <p class="mb-2"><strong>Email:</strong> <a
                                href="mailto:{{ $order->customer_email }}">{{ $order->customer_email }}</a></p>
                        <p class="mb-0"><strong>Phone:</strong> <a
                                href="tel:{{ $order->customer_phone }}">{{ $order->customer_phone }}</a></p>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Shipping Address</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $order->customer_name }}</p>
                        <p class="mb-0">{{ $order->shipping_address }}</p>
                    </div>
                </div>

                <!-- Payment Information -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Payment Information</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-2">
                            <strong>Method:</strong> {{ strtoupper($order->payment_method) }}
                        </p>
                        <p class="mb-0">
                            <strong>Status:</strong>
                            <span class="badge bg-{{ $order->payment_status_color }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </p>
                    </div>
                </div>

                <!-- Order Notes -->
                @if ($order->notes)
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Order Notes</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $order->notes }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Update Status Modal -->
    <div class="modal fade" id="updateStatusModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.orders.status', $order) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title">Update Order Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Order Status</label>
                            <select name="status" class="form-select" required>
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>
                                    Processing</option>
                                <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped
                                </option>
                                <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered
                                </option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Status</label>
                            <select name="payment_status" class="form-select">
                                <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid
                                </option>
                                <option value="failed" {{ $order->payment_status === 'failed' ? 'selected' : '' }}>Failed
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
