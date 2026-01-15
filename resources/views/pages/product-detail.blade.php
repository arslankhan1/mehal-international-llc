{{-- @extends('includes.main')
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
@endpush --}}

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
                            @if ($product->images->count() > 0)
                                <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                    alt="{{ $product->name }}" class="product-main-image" id="mainImage"
                                    style="cursor: zoom-in;">
                            @else
                                <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="{{ $product->name }}"
                                    class="product-main-image" id="mainImage">
                            @endif
                        </div>

                        <!-- Thumbnail Images -->
                        @if ($product->images->count() > 1)
                            <div class="product-thumbnails">
                                @foreach ($product->images as $index => $image)
                                    <div class="thumbnail-item {{ $index === 0 ? 'active' : '' }}"
                                        data-image="{{ asset('storage/' . $image->image_path) }}">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $product->name }}">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-6">
                    <div class="product-detail-info">
                        <!-- Vendor -->
                        <p class="product-vendor">{{ $product->brand->name }}</p>

                        <!-- Title -->
                        <h1 class="product-detail-title">{{ $product->name }}</h1>

                        <!-- Price -->
                        <div class="product-price-wrapper">
                            <span class="product-detail-price">${{ number_format($product->price, 2) }} USD</span>
                            @if ($product->status === 'sold_out' || $product->stock <= 0)
                                <span class="product-sold-badge">Sold out</span>
                            @endif
                        </div>

                        @if ($product->status === 'active' && $product->stock > 0)
                            <form action="{{ route('cart.add') }}" method="POST" id="addToCartForm">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

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
                                        <input type="number" class="quantity-input" name="quantity" value="1"
                                            min="1" max="{{ $product->stock }}">
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
                                    <button type="submit" class="btn-add-to-cart">Add to cart</button>
                                    <button type="button" class="btn-buy-now">
                                        <i class="fab fa-paypal"></i> Buy with PayPal
                                    </button>
                                </div>
                                <p class="text-center text-muted mt-2" style="font-size: 0.9rem;">More payment options</p>
                            </form>
                        @else
                            <!-- Quantity Selector (Disabled) -->
                            <div class="quantity-section">
                                <label class="quantity-label">Quantity</label>
                                <div class="quantity-selector">
                                    <button class="quantity-btn quantity-decrease" type="button" disabled>
                                        <svg width="10" height="2" viewBox="0 0 10 2" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 1H10" stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                    </button>
                                    <input type="number" class="quantity-input" value="1" min="1" disabled>
                                    <button class="quantity-btn quantity-increase" type="button" disabled>
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 0V10M0 5H10" stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Sold Out Button -->
                            <div class="product-actions">
                                <button class="btn-sold-out" disabled>Sold out</button>
                            </div>
                        @endif

                        <!-- Product Description -->
                        @if ($product->description)
                            <div class="product-description">
                                <p>{{ $product->description }}</p>
                            </div>
                        @endif

                        <!-- Product Features -->
                        @if ($product->features)
                            <div class="product-features">
                                <ul>
                                    @foreach (explode("\n", $product->features) as $feature)
                                        @if (trim($feature))
                                            <li>{{ trim($feature) }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Share Button -->
                        <div class="product-share">
                            <button class="share-btn" id="shareBtn">
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

            <!-- Related Products -->
            @if ($relatedProducts->count() > 0)
                <div class="related-products-section mt-5">
                    <h2 class="section-title">You may also like</h2>
                    <div class="row g-4">
                        @foreach ($relatedProducts as $relatedProduct)
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ route('product.detail', $relatedProduct->slug) }}" class="product-card-link">
                                    <div class="product-card">
                                        <div class="product-image-wrapper">
                                            @if ($relatedProduct->status === 'sold_out' || $relatedProduct->stock <= 0)
                                                <span class="sold-out-badge">Sold out</span>
                                            @endif
                                            @if ($relatedProduct->images->count() > 0)
                                                <img src="{{ asset('storage/' . $relatedProduct->images->first()->image_path) }}"
                                                    alt="{{ $relatedProduct->name }}" class="product-image">
                                            @endif
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title">{{ Str::limit($relatedProduct->name, 60) }}</h3>
                                            <p class="product-price">${{ number_format($relatedProduct->price, 2) }} USD
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Image Zoom Modal -->
    <div class="modal fade" id="imageZoomModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content" style="background: transparent; border: none;">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    style="position: absolute; top: 10px; right: 10px; z-index: 1051;"></button>
                <div class="modal-body p-0 m-0">
                    <img src="" id="zoomImage" class="img-fluid"
                        style="width: 100%; height: auto; display: block;">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .product-main-image {
            width: 100%;
            max-width: 500px;
            height: 500px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-thumbnails {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .product-thumbnails .thumbnail-item {
            width: 92px;
            height: 92px;
            border: 2px solid #e5e5e5;
            border-radius: 5px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s;
        }

        .product-thumbnails .thumbnail-item.active {
            border-color: #2c3e38;
        }

        .product-thumbnails .thumbnail-item:hover {
            border-color: #2c3e38;
        }

        .product-thumbnails .thumbnail-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #imageZoomModal .modal-dialog {
            max-width: 90%;
        }

        #imageZoomModal .modal-content {
            background: rgba(0, 0, 0, 0.95) !important;
        }

        #imageZoomModal .modal-body {
            padding: 0 !important;
            margin: 0 !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-add-to-cart {
            background: #2c3e38;
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: all 0.3s;
        }

        .btn-add-to-cart:hover {
            background: #1a2620;
        }

        .btn-buy-now {
            background: #ffc439;
            color: #111;
            border: none;
            padding: 15px;
            width: 100%;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .btn-buy-now:hover {
            background: #f5b800;
        }

        .btn-sold-out {
            background: #ccc;
            color: #666;
            border: none;
            padding: 15px;
            width: 100%;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 5px;
            cursor: not-allowed;
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Thumbnail Image Switching
        document.querySelectorAll('.thumbnail-item').forEach(thumb => {
            thumb.addEventListener('click', function() {
                document.querySelectorAll('.thumbnail-item').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                const newImage = this.getAttribute('data-image');
                document.getElementById('mainImage').src = newImage;
            });
        });

        // Image Zoom
        document.getElementById('mainImage').addEventListener('click', function() {
            document.getElementById('zoomImage').src = this.src;
            new bootstrap.Modal(document.getElementById('imageZoomModal')).show();
        });

        // Quantity Selector
        const decreaseBtn = document.querySelector('.quantity-decrease');
        const increaseBtn = document.querySelector('.quantity-increase');
        const quantityInput = document.querySelector('.quantity-input');

        if (decreaseBtn && increaseBtn && quantityInput) {
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
        }

        // Share Button
        document.getElementById('shareBtn').addEventListener('click', function() {
            if (navigator.share) {
                navigator.share({
                    title: document.title,
                    url: window.location.href
                });
            } else {
                navigator.clipboard.writeText(window.location.href);
                alert('Link copied to clipboard!');
            }
        });
    </script>
@endpush
