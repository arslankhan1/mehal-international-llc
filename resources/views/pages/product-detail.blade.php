@extends('includes.main')
@section('content')
    <!-- Product Detail Section -->
    <section class="product-detail-section">
        <div class="container">
            <div class="row g-5">
                <!-- Product Images -->
                <div class="col-lg-6">
                    <div class="product-images-wrapper">
                        <!-- Main Image -->
                        <div class="product-main-image-wrapper">
                            <img src="{{ asset('assets/products/10.jpg') }}" alt="LEGO Marvel" class="product-main-image"
                                id="mainImage">
                        </div>

                        <!-- Thumbnail Images -->
                        <div class="product-thumbnails">
                            <div class="thumbnail-item active" data-image="{{ asset('assets/products/10.jpg') }}">
                                <img src="{{ asset('assets/products/10-thumb-1.jpg') }}" alt="Thumbnail 1">
                            </div>
                            <div class="thumbnail-item" data-image="{{ asset('assets/products/10-thumb-2.jpg') }}">
                                <img src="{{ asset('assets/products/10-thumb-2.jpg') }}" alt="Thumbnail 2">
                            </div>
                            <div class="thumbnail-item" data-image="{{ asset('assets/products/10-thumb-3.jpg') }}">
                                <img src="{{ asset('assets/products/10-thumb-3.jpg') }}" alt="Thumbnail 3">
                            </div>
                            <div class="thumbnail-item" data-image="{{ asset('assets/products/10-thumb-4.jpg') }}">
                                <img src="{{ asset('assets/products/10-thumb-4.jpg') }}" alt="Thumbnail 4">
                            </div>
                            <div class="thumbnail-item" data-image="{{ asset('assets/products/10-thumb-5.jpg') }}">
                                <img src="{{ asset('assets/products/10-thumb-5.jpg') }}" alt="Thumbnail 5">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-6">
                    <div class="product-detail-info">
                        <!-- Vendor -->
                        <p class="product-vendor">Mehal International LLC.</p>

                        <!-- Title -->
                        <h1 class="product-detail-title">LEGO Marvel The Goat Boat 76208 Building Set - Thor Set with Toy
                            Ship, Stormbreaker, and Movie Inspired Thor, Korg, and Valkyrie Minifigures, Avengers Gifts for
                            Kids, Boys, and Girls Ages 8+</h1>

                        <!-- Price -->
                        <div class="product-price-wrapper">
                            <span class="product-detail-price">$47.44 USD</span>
                            <span class="product-sold-badge">Sold out</span>
                        </div>

                        <!-- Quantity Selector -->
                        <div class="quantity-section">
                            <label class="quantity-label">Quantity</label>
                            <div class="quantity-selector">
                                <button class="quantity-btn quantity-decrease" type="button">
                                    <svg width="10" height="2" viewBox="0 0 10 2" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 1H10" stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                </button>
                                <input type="number" class="quantity-input" value="1" min="1" max="10">
                                <button class="quantity-btn quantity-increase" type="button">
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 0V10M0 5H10" stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Add to Cart Buttons -->
                        <div class="product-actions">
                            <button class="btn-sold-out" disabled>Sold out</button>
                            <button class="btn-buy-now">Buy it now</button>
                        </div>

                        <!-- Product Description -->
                        <div class="product-description">
                            <p>LEGO Marvel The Goat Boat 76208 Building Set - Thor Set with Toy Ship, Stormbreaker, and
                                Movie Inspired Thor, Korg, and Valkyrie Minifigures, Avengers Gifts for Kids, Boys, and
                                Girls Ages 8+</p>
                        </div>

                        <!-- Product Features -->
                        <div class="product-features">
                            <ul>
                                <li>LEGO Marvel The Goat Boat 76208 Building Kit; Collectible Thor Construction Toy with 5
                                    Minifigures for Kids Ages 8+ (564 Pieces)</li>
                            </ul>
                        </div>

                        <!-- Share Button -->
                        <div class="product-share">
                            <button class="share-btn">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 10.5C12.3 10.5 11.7 10.8 11.2 11.2L5.9 8.2C5.9 8.1 6 8.1 6 8C6 7.9 5.9 7.9 5.9 7.8L11.2 4.8C11.7 5.2 12.3 5.5 13 5.5C14.4 5.5 15.5 4.4 15.5 3C15.5 1.6 14.4 0.5 13 0.5C11.6 0.5 10.5 1.6 10.5 3C10.5 3.1 10.5 3.2 10.6 3.2L5.3 6.2C4.8 5.8 4.2 5.5 3.5 5.5C2.1 5.5 1 6.6 1 8C1 9.4 2.1 10.5 3.5 10.5C4.2 10.5 4.8 10.2 5.3 9.8L10.6 12.8C10.5 12.9 10.5 12.9 10.5 13C10.5 14.4 11.6 15.5 13 15.5C14.4 15.5 15.5 14.4 15.5 13C15.5 11.6 14.4 10.5 13 10.5Z"
                                        fill="currentColor" />
                                </svg>
                                Share
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Thumbnail Image Switching
        document.querySelectorAll('.thumbnail-item').forEach(thumb => {
            thumb.addEventListener('click', function() {
                // Remove active class from all thumbnails
                document.querySelectorAll('.thumbnail-item').forEach(t => t.classList.remove('active'));

                // Add active class to clicked thumbnail
                this.classList.add('active');

                // Change main image
                const newImage = this.getAttribute('data-image');
                document.getElementById('mainImage').src = newImage;
            });
        });

        // Quantity Selector
        const decreaseBtn = document.querySelector('.quantity-decrease');
        const increaseBtn = document.querySelector('.quantity-increase');
        const quantityInput = document.querySelector('.quantity-input');

        decreaseBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            if (value > 1) {
                quantityInput.value = value - 1;
            }
        });

        increaseBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            let max = parseInt(quantityInput.max);
            if (value < max) {
                quantityInput.value = value + 1;
            }
        });

        quantityInput.addEventListener('change', function() {
            let value = parseInt(this.value);
            let min = parseInt(this.min);
            let max = parseInt(this.max);

            if (value < min) this.value = min;
            if (value > max) this.value = max;
        });

        // Share Button
        document.querySelector('.share-btn').addEventListener('click', function() {
            if (navigator.share) {
                navigator.share({
                    title: document.title,
                    url: window.location.href
                });
            } else {
                // Fallback: copy to clipboard
                navigator.clipboard.writeText(window.location.href);
                alert('Link copied to clipboard!');
            }
        });
    </script>
@endpush
