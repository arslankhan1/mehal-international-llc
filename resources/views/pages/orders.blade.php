@extends('includes.main')
@section('content')
    <!-- Page Title Section -->
    <section class="page-title-section">
        <div class="container">
            <h1 class="page-title">My Orders</h1>
        </div>
    </section>

    <!-- Orders Section -->
    <section class="orders-section py-5">
        <div class="container">
            @if ($orders->count() > 0)
                <div class="orders-list">
                    @foreach ($orders as $order)
                        <div class="order-card">
                            <div class="order-card-header">
                                <div class="order-info">
                                    <h3>Order #{{ $order->order_number }}</h3>
                                    <p class="order-date">Placed on {{ $order->created_at->format('M d, Y') }}</p>
                                </div>
                                <div class="order-status">
                                    <span class="badge bg-{{ $order->status_color }}">{{ ucfirst($order->status) }}</span>
                                    <span
                                        class="badge bg-{{ $order->payment_status_color }}">{{ ucfirst($order->payment_status) }}</span>
                                </div>
                            </div>

                            <div class="order-card-body">
                                <div class="order-items-preview">
                                    @foreach ($order->items->take(3) as $item)
                                        <div class="order-item-mini">
                                            @if ($item->product && $item->product->images->count() > 0)
                                                <img src="{{ asset('storage/' . $item->product->images->first()->image_path) }}"
                                                    alt="{{ $item->product_name }}">
                                            @else
                                                <img src="{{ asset('assets/images/placeholder.jpg') }}"
                                                    alt="{{ $item->product_name }}">
                                            @endif
                                        </div>
                                    @endforeach
                                    @if ($order->items->count() > 3)
                                        <div class="order-item-more">
                                            +{{ $order->items->count() - 3 }} more
                                        </div>
                                    @endif
                                </div>

                                <div class="order-summary-info">
                                    <p><strong>Total:</strong> ${{ number_format($order->total, 2) }} USD</p>
                                    <p><strong>Items:</strong> {{ $order->items->sum('quantity') }}</p>
                                    <p><strong>Payment:</strong>
                                        {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                                </div>
                            </div>

                            <div class="order-card-footer">
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-dark">
                                    <i class="fas fa-eye"></i> View Details
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $orders->links() }}
                    </div>
                </div>
            @else
                <div class="empty-orders text-center py-5">
                    <i class="fas fa-shopping-bag fa-4x text-muted mb-4"></i>
                    <h2>No Orders Yet</h2>
                    <p class="text-muted">You haven't placed any orders yet. Start shopping to see your orders here.</p>
                    <a href="{{ route('products') }}" class="btn btn-dark mt-3">
                        <i class="fas fa-shopping-bag"></i> Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .orders-list {
            max-width: 900px;
            margin: 0 auto;
        }

        .order-card {
            background: white;
            border-radius: 10px;
            border: 1px solid #e5e5e5;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .order-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #e5e5e5;
            background: #f8f9fa;
        }

        .order-info h3 {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .order-date {
            color: #666;
            font-size: 0.9rem;
            margin: 0;
        }

        .order-status {
            display: flex;
            gap: 8px;
        }

        .order-card-body {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .order-items-preview {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .order-item-mini {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            overflow: hidden;
        }

        .order-item-mini img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .order-item-more {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            color: #666;
            border: 2px dashed #dee2e6;
        }

        .order-summary-info p {
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .order-card-footer {
            padding: 15px 20px;
            border-top: 1px solid #e5e5e5;
            background: #f8f9fa;
            text-align: right;
        }

        @media (max-width: 768px) {
            .order-card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .order-card-body {
                flex-direction: column;
                align-items: flex-start;
            }

            .order-items-preview {
                width: 100%;
            }
        }
    </style>
@endpush
