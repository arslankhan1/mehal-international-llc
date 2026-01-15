@extends('includes.main')
@section('content')
    <!-- Brand Header -->
    <section class="page-title-section">
        <div class="container">
            <div class="d-flex align-items-center gap-3">
                @if ($brand->logo)
                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}"
                        style="width: 80px; height: 80px; object-fit: contain;">
                @endif
                <div>
                    <h1 class="page-title mb-0">{{ $brand->name }}</h1>
                    <p class="text-muted mb-0">{{ $products->total() }} products</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="products-grid-section">
        <div class="container">
            <div class="row g-4">
                @forelse($products as $product)
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('product.detail', $product->slug) }}" class="product-card-link">
                            <div class="product-card">
                                <div class="product-image-wrapper">
                                    @if ($product->status === 'sold_out' || $product->stock <= 0)
                                        <span class="sold-out-badge">Sold out</span>
                                    @endif
                                    @if ($product->images->count() > 0)
                                        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                            alt="{{ $product->name }}" class="product-image">
                                    @else
                                        <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="{{ $product->name }}"
                                            class="product-image">
                                    @endif
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title">{{ $product->name }}</h3>
                                    <p class="product-price">${{ number_format($product->price, 2) }} USD</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                        <p class="text-muted">No products found for this brand.</p>
                        <a href="{{ route('products') }}" class="btn btn-dark">Browse All Products</a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($products->hasPages())
                <div class="pagination-wrapper mt-4">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
