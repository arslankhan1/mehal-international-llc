@extends('includes.main')
@section('content')
    <!-- Page Title Section -->
    <section class="page-title-section">
        <div class="container">
            <h1 class="page-title">Checkout</h1>
        </div>
    </section>

    <!-- Checkout Section -->
    <section class="checkout-section py-5">
        <div class="container">
            <form action="{{ route('checkout.process') }}" method="POST" id="checkoutForm">
                @csrf
                <div class="row g-4">
                    <!-- Shipping Information -->
                    <div class="col-lg-7">
                        <div class="checkout-box">
                            <h3>Contact Information</h3>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" name="customer_name"
                                        class="form-control @error('customer_name') is-invalid @enderror"
                                        value="{{ old('customer_name', $user->name ?? '') }}" required>
                                    @error('customer_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email *</label>
                                    <input type="email" name="customer_email"
                                        class="form-control @error('customer_email') is-invalid @enderror"
                                        value="{{ old('customer_email', $user->email ?? '') }}" required>
                                    @error('customer_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone *</label>
                                    <input type="tel" name="customer_phone"
                                        class="form-control @error('customer_phone') is-invalid @enderror"
                                        value="{{ old('customer_phone', $user->phone ?? '') }}" required>
                                    @error('customer_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="checkout-box mt-4">
                            <h3>Shipping Address</h3>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Street Address *</label>
                                    <input type="text" name="shipping_address"
                                        class="form-control @error('shipping_address') is-invalid @enderror"
                                        value="{{ old('shipping_address') }}" required>
                                    @error('shipping_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">City *</label>
                                    <input type="text" name="shipping_city"
                                        class="form-control @error('shipping_city') is-invalid @enderror"
                                        value="{{ old('shipping_city') }}" required>
                                    @error('shipping_city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">State *</label>
                                    <input type="text" name="shipping_state"
                                        class="form-control @error('shipping_state') is-invalid @enderror"
                                        value="{{ old('shipping_state') }}" required>
                                    @error('shipping_state')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">ZIP Code *</label>
                                    <input type="text" name="shipping_zip"
                                        class="form-control @error('shipping_zip') is-invalid @enderror"
                                        value="{{ old('shipping_zip') }}" required>
                                    @error('shipping_zip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="checkout-box mt-4">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="billing_same" id="billingSame"
                                    checked>
                                <label class="form-check-label" for="billingSame">
                                    Billing address same as shipping
                                </label>
                            </div>

                            <div id="billingAddressSection" style="display: none;">
                                <h3>Billing Address</h3>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Street Address</label>
                                        <input type="text" name="billing_address" class="form-control"
                                            value="{{ old('billing_address') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">City</label>
                                        <input type="text" name="billing_city" class="form-control"
                                            value="{{ old('billing_city') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">State</label>
                                        <input type="text" name="billing_state" class="form-control"
                                            value="{{ old('billing_state') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">ZIP Code</label>
                                        <input type="text" name="billing_zip" class="form-control"
                                            value="{{ old('billing_zip') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-box mt-4">
                            <h3>Payment Method</h3>
                            <div class="payment-method-box">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="cod"
                                        value="cod" checked>
                                    <label class="form-check-label" for="cod">
                                        <strong>Cash on Delivery (COD)</strong>
                                        <p class="text-muted mb-0">Pay with cash upon delivery</p>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-box mt-4">
                            <label class="form-label">Order Notes (Optional)</label>
                            <textarea name="notes" class="form-control" rows="3"
                                placeholder="Notes about your order, e.g. special delivery instructions">{{ old('notes') }}</textarea>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="col-lg-5">
                        <div class="order-summary-box">
                            <h3>Order Summary</h3>
                            <div class="order-items">
                                @foreach ($cartItems as $item)
                                    <div class="order-item">
                                        <div class="order-item-image">
                                            @if ($item['product']->images->count() > 0)
                                                <img src="{{ asset('storage/' . $item['product']->images->first()->image_path) }}"
                                                    alt="{{ $item['product']->name }}">
                                            @else
                                                <img src="{{ asset('assets/images/placeholder.jpg') }}"
                                                    alt="{{ $item['product']->name }}">
                                            @endif
                                            <span class="item-quantity">{{ $item['quantity'] }}</span>
                                        </div>
                                        <div class="order-item-details">
                                            <p class="item-name">{{ $item['product']->name }}</p>
                                            <p class="item-brand">{{ $item['product']->brand->name }}</p>
                                        </div>
                                        <div class="order-item-price">
                                            ${{ number_format($item['subtotal'], 2) }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="order-totals">
                                <div class="total-row">
                                    <span>Subtotal</span>
                                    <span>${{ number_format($subtotal, 2) }}</span>
                                </div>
                                <div class="total-row">
                                    <span>Shipping</span>
                                    <span>Free</span>
                                </div>
                                <div class="total-row">
                                    <span>Tax</span>
                                    <span>$0.00</span>
                                </div>
                                <hr>
                                <div class="total-row total-final">
                                    <strong>Total</strong>
                                    <strong>${{ number_format($subtotal, 2) }} USD</strong>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-dark btn-place-order w-100">
                                Place Order
                            </button>

                            <p class="order-policy mt-3 text-muted text-center">
                                By placing your order, you agree to our terms and conditions
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .checkout-box,
        .order-summary-box {
            background: white;
            border-radius: 10px;
            padding: 25px;
            border: 1px solid #e5e5e5;
        }

        .checkout-box h3,
        .order-summary-box h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: #2c3e38;
        }

        .payment-method-box {
            border: 2px solid #e5e5e5;
            padding: 15px;
            border-radius: 8px;
        }

        .order-items {
            max-height: 400px;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        .order-item {
            display: flex;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #e5e5e5;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-item-image {
            width: 60px;
            height: 60px;
            position: relative;
            flex-shrink: 0;
        }

        .order-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }

        .item-quantity {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #2c3e38;
            color: white;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
        }

        .order-item-details {
            flex-grow: 1;
        }

        .item-name {
            font-size: 0.9rem;
            margin-bottom: 3px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .item-brand {
            font-size: 0.8rem;
            color: #666;
            margin: 0;
        }

        .order-item-price {
            font-weight: 600;
            white-space: nowrap;
        }

        .order-totals {
            padding: 20px 0;
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

        .btn-place-order {
            padding: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            background: #2c3e38;
            border: none;
        }

        .btn-place-order:hover {
            background: #1a2620;
        }

        .order-policy {
            font-size: 0.85rem;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.getElementById('billingSame').addEventListener('change', function() {
            const billingSection = document.getElementById('billingAddressSection');
            if (this.checked) {
                billingSection.style.display = 'none';
            } else {
                billingSection.style.display = 'block';
            }
        });
    </script>
@endpush
