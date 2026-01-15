@extends('includes.main')
@section('content')
    <!-- Page Title Section -->
    <section class="page-title-section">
        <div class="container">
            <h1 class="page-title">Order Details</h1>
        </div>
    </section>

    <!-- Order Detail Section -->
    <section class="order-detail-section py-5">
        <div class="container">
            <div class="order-detail-wrapper">
                <!-- Order Header -->
                <div class="order-header-box">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2>Order #{{ $order->order_number }}</h2>
                            <p class="order-date">Placed on {{ $order->created_at->format('M d, Y h:i A') }}</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <span class="badge bg-{{ $order->status_color }} badge-lg">{{ ucfirst($order->status) }}</span>
                            <span
                                class="badge bg-{{ $order->payment_status_color }} badge-lg">{{ ucfirst($order->payment_status) }}</span>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mt-3">
                    <!-- Order Items -->
                    <div class="col-lg-8">
                        <div class="detail-box">
                            <h3>Order Items</h3>
                            <div class="order-items-list">
                                @foreach ($order->items as $item)
                                    <div class="order-item-detail">
                                        <div class="item-image">
                                            @if ($item->product && $item->product->images->count() > 0)
                                                <img src="{{ asset('storage/' . $item->product->images->first()->image_path) }}"
                                                    alt="{{ $item->product_name }}">
                                            @else
                                                <img src="{{ asset('assets/images/placeholder.jpg') }}"
                                                    alt="{{ $item->product_name }}">
                                            @endif
                                        </div>
                                        <div class="item-info">
                                            <h4>{{ $item->product_name }}</h4>
                                            <p class="item-price">${{ number_format($item->price, 2) }} ×
                                                {{ $item->quantity }}</p>
                                        </div>
                                        <div class="item-total">
                                            ${{ number_format($item->total, 2) }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="order-totals-detail">
                                <div class="total-row">
                                    <span>Subtotal</span>
                                    <span>${{ number_format($order->subtotal, 2) }}</span>
                                </div>
                                <div class="total-row">
                                    <span>Shipping</span>
                                    <span>${{ number_format($order->shipping, 2) }}</span>
                                </div>
                                <div class="total-row">
                                    <span>Tax</span>
                                    <span>${{ number_format($order->tax, 2) }}</span>
                                </div>
                                <hr>
                                <div class="total-row total-final">
                                    <strong>Total</strong>
                                    <strong>${{ number_format($order->total, 2) }} USD</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Information -->
                    <div class="col-lg-4">
                        <div class="detail-box">
                            <h3>Customer Information</h3>
                            <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                            <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                            <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
                        </div>

                        <div class="detail-box mt-3">
                            <h3>Shipping Address</h3>
                            <p>{{ $order->customer_name }}</p>
                            <p>{{ $order->shipping_address }}</p>
                        </div>

                        <div class="detail-box mt-3">
                            <h3>Payment Information</h3>
                            <p><strong>Method:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                            <p><strong>Status:</strong> <span
                                    class="badge bg-{{ $order->payment_status_color }}">{{ ucfirst($order->payment_status) }}</span>
                            </p>
                        </div>

                        @if ($order->notes)
                            <div class="detail-box mt-3">
                                <h3>Order Notes</h3>
                                <p>{{ $order->notes }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="action-buttons mt-4">
                    <a href="{{ route('orders.index') }}" class="btn btn-outline-dark">
                        <i class="fas fa-arrow-left"></i> Back to Orders
                    </a>
                    <a href="{{ route('products') }}" class="btn btn-dark">
                        <i class="fas fa-shopping-bag"></i> Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .order-detail-wrapper {
            max-width: 1200px;
            margin: 0 auto;
        }

        .order-header-box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #e5e5e5;
        }

        .order-header-box h2 {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }

        .order-date {
            color: #666;
            font-size: 0.95rem;
        }

        .badge-lg {
            padding: 8px 15px;
            font-size: 0.9rem;
        }

        .detail-box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #e5e5e5;
        }

        .detail-box h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #2c3e38;
        }

        .order-items-list {
            margin-bottom: 20px;
        }

        .order-item-detail {
            display: flex;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #e5e5e5;
        }

        .order-item-detail:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 80px;
            height: 80px;
            flex-shrink: 0;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .item-info {
            flex-grow: 1;
        }

        .item-info h4 {
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .item-price {
            color: #666;
            font-size: 0.9rem;
        }

        .item-total {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .order-totals-detail {
            padding-top: 20px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .total-final {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
            }

            .action-buttons .btn {
                width: 100%;
            }
        }
    </style>
@endpush
