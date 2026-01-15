@extends('includes.main')
@section('content')
    <!-- Page Title Section -->
    <section class="page-title-section">
        <div class="container">
            <h1 class="page-title">Shopping Cart</h1>
        </div>
    </section>

    <!-- Cart Section -->
    <section class="cart-section py-5">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (count($cartItems) > 0)
                <div class="row g-4">
                    <!-- Cart Items -->
                    <div class="col-lg-8">
                        <div class="cart-items-wrapper">
                            @foreach ($cartItems as $item)
                                <div class="cart-item">
                                    <div class="cart-item-image">
                                        @if ($item['product']->images->count() > 0)
                                            <img src="{{ asset('storage/' . $item['product']->images->first()->image_path) }}"
                                                alt="{{ $item['product']->name }}">
                                        @else
                                            <img src="{{ asset('assets/images/placeholder.jpg') }}"
                                                alt="{{ $item['product']->name }}">
                                        @endif
                                    </div>
                                    <div class="cart-item-details">
                                        <h3 class="cart-item-title">
                                            <a
                                                href="{{ route('product.detail', $item['product']->slug) }}">{{ $item['product']->name }}</a>
                                        </h3>
                                        <p class="cart-item-brand">{{ $item['product']->brand->name }}</p>
                                        <p class="cart-item-price">${{ number_format($item['product']->price, 2) }} USD</p>

                                        <div class="cart-item-quantity">
                                            <label>Quantity:</label>
                                            <div class="quantity-selector">
                                                <button class="quantity-btn quantity-decrease"
                                                    data-product-id="{{ $item['product']->id }}">-</button>
                                                <input type="number" class="quantity-input"
                                                    value="{{ $item['quantity'] }}" min="1"
                                                    data-product-id="{{ $item['product']->id }}" readonly>
                                                <button class="quantity-btn quantity-increase"
                                                    data-product-id="{{ $item['product']->id }}">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-item-actions">
                                        <p class="cart-item-subtotal">${{ number_format($item['subtotal'], 2) }} USD</p>
                                        <form action="{{ route('cart.remove') }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
                                            <button type="submit" class="btn-remove-item">
                                                <i class="fas fa-trash"></i> Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="cart-actions mt-4">
                            <a href="{{ route('products') }}" class="btn btn-outline-dark">
                                <i class="fas fa-arrow-left"></i> Continue Shopping
                            </a>
                            <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to clear your cart?')">
                                    <i class="fas fa-trash"></i> Clear Cart
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Cart Summary -->
                    <div class="col-lg-4">
                        <div class="cart-summary">
                            <h3>Order Summary</h3>
                            <div class="summary-row">
                                <span>Subtotal</span>
                                <span id="cart-subtotal">${{ number_format($subtotal, 2) }} USD</span>
                            </div>
                            <div class="summary-row">
                                <span>Shipping</span>
                                <span>Free</span>
                            </div>
                            <div class="summary-row">
                                <span>Tax</span>
                                <span>$0.00 USD</span>
                            </div>
                            <hr>
                            <div class="summary-row summary-total">
                                <strong>Total</strong>
                                <strong id="cart-total">${{ number_format($subtotal, 2) }} USD</strong>
                            </div>
                            <a href="{{ route('checkout.index') }}" class="btn btn-dark btn-checkout w-100 mt-3">
                                Proceed to Checkout
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="empty-cart text-center py-5">
                    <i class="fas fa-shopping-cart fa-4x text-muted mb-4"></i>
                    <h2>Your cart is empty</h2>
                    <p class="text-muted">Add some products to your cart to see them here.</p>
                    <a href="{{ route('products') }}" class="btn btn-dark mt-3 fs-3 btn-size">
                        <i class="fas fa-shopping-bag"></i> Continue Shopping
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .cart-items-wrapper {
            background: white;
            border-radius: 10px;
            padding: 20px;
        }

        .btn-size {
            padding: 10px 60px;
        }

        .cart-item {
            display: flex;
            gap: 20px;
            padding: 20px 0;
            border-bottom: 1px solid #e5e5e5;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item-image {
            width: 120px;
            height: 120px;
            flex-shrink: 0;
        }

        .cart-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .cart-item-details {
            flex-grow: 1;
        }

        .cart-item-title {
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .cart-item-title a {
            color: #333;
            text-decoration: none;
        }

        .cart-item-title a:hover {
            color: #2c3e38;
        }

        .cart-item-brand {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .cart-item-price {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .cart-item-quantity label {
            font-size: 0.9rem;
            margin-bottom: 5px;
            display: block;
        }

        .cart-item-actions {
            text-align: right;
        }

        .cart-item-subtotal {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .btn-remove-item {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn-remove-item:hover {
            color: #c82333;
        }

        .cart-summary {
            background: white;
            border-radius: 10px;
            padding: 25px;
            position: sticky;
            top: 20px;
        }

        .cart-summary h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .summary-total {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .btn-checkout {
            padding: 15px;
            font-size: 1rem;
            font-weight: 600;
            background: #2c3e38;
            border: none;
        }

        .btn-checkout:hover {
            background: #1a2620;
        }

        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
            }

            .cart-item-actions {
                text-align: left;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Quantity update handlers
            document.querySelectorAll('.quantity-decrease, .quantity-increase').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const input = document.querySelector(
                        `.quantity-input[data-product-id="${productId}"]`);
                    let quantity = parseInt(input.value);

                    if (this.classList.contains('quantity-decrease') && quantity > 1) {
                        quantity--;
                    } else if (this.classList.contains('quantity-increase')) {
                        quantity++;
                    }

                    updateCartQuantity(productId, quantity);
                });
            });
        });

        function updateCartQuantity(productId, quantity) {
            fetch('{{ route('cart.update') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: quantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert(data.message || 'Failed to update quantity');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
@endpush
