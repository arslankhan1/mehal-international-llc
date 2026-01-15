@extends('includes.main')
@section('content')
    <!-- Order Success Section -->
    <section class="order-success-section py-5">
        <div class="container">
            <div class="success-box text-center">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h1>Order Placed Successfully!</h1>
                <p class="lead">Thank you for your order. We've received your order and will process it soon.</p>

                <div class="order-details-box mt-5">
                    <div class="row">
                        <div class="col-md-6 text-md-start">
                            <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
                            <p><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y') }}</p>
                            <p><strong>Payment Method:</strong> Cash on Delivery</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <p><strong>Total Amount:</strong> ${{ number_format($order->total, 2) }} USD</p>
                            <p><strong>Status:</strong> <span class="badge bg-warning">{{ ucfirst($order->status) }}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="shipping-info-box mt-4 text-start">
                    <h4>Shipping Address</h4>
                    <p>{{ $order->customer_name }}</p>
                    <p>{{ $order->shipping_address }}</p>
                    <p>{{ $order->customer_phone }}</p>
                    <p>{{ $order->customer_email }}</p>
                </div>

                <div class="order-items-box mt-4">
                    <h4>Order Items</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
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
                                            <div class="d-flex align-items-center gap-2">
                                                @if ($item->product && $item->product->images->count() > 0)
                                                    <img src="{{ asset('storage/' . $item->product->images->first()->image_path) }}"
                                                        alt="{{ $item->product_name }}"
                                                        style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                                @endif
                                                <span>{{ $item->product_name }}</span>
                                            </div>
                                        </td>
                                        <td>${{ number_format($item->price, 2) }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>${{ number_format($item->total, 2) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Subtotal:</strong></td>
                                    <td><strong>${{ number_format($order->subtotal, 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Shipping:</strong></td>
                                    <td><strong>${{ number_format($order->shipping, 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                    <td><strong>${{ number_format($order->total, 2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="action-buttons mt-5">
                    @auth
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-dark me-2">
                            <i class="fas fa-receipt"></i> View Order Details
                        </a>
                        <a href="{{ route('orders.index') }}" class="btn btn-outline-dark me-2">
                            <i class="fas fa-list"></i> My Orders
                        </a>
                    @endauth
                    <a href="{{ route('products') }}" class="btn btn-dark">
                        <i class="fas fa-shopping-bag"></i> Continue Shopping
                    </a>
                </div>

                <div class="alert alert-info mt-4">
                    <i class="fas fa-info-circle"></i>
                    We'll send you an email confirmation shortly. You can track your order status in your account.
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .success-box {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
        }

        .success-icon {
            font-size: 5rem;
            color: #28a745;
            margin-bottom: 20px;
        }

        .order-details-box {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            border-left: 4px solid #28a745;
        }

        .shipping-info-box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #e5e5e5;
        }

        .order-items-box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #e5e5e5;
        }

        .order-items-box h4 {
            margin-bottom: 20px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
        }
    </style>
@endpush
