@extends('includes.main')
@section('content')
    <!-- Collection Header -->
    <section class="collection-header-section">
        <div class="container">
            <h1 class="collection-title">Products</h1>
        </div>
    </section>

    <!-- Filter and Sort Bar -->
    <section class="filter-sort-section">
        <div class="container">
            <form action="{{ route('products') }}" method="GET" id="filterForm">
                <div class="filter-sort-bar">
                    <div class="filter-group">
                        <span class="filter-label">Filter:</span>

                        <!-- Availability Filter -->
                        <div class="filter-dropdown-wrapper">
                            <button type="button" class="filter-btn" id="availabilityFilter">
                                Availability
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </button>
                            <div class="filter-dropdown" id="availabilityDropdown">
                                <div class="filter-dropdown-header">
                                    <span
                                        class="filter-selected-count">{{ request()->has('availability') ? count(request('availability')) : 0 }}
                                        selected</span>
                                    <button type="button" class="filter-reset-btn"
                                        onclick="resetAvailability()">Reset</button>
                                </div>
                                <div class="filter-options">
                                    <label class="filter-option">
                                        <input type="checkbox" name="availability[]" value="in_stock"
                                            {{ is_array(request('availability')) && in_array('in_stock', request('availability')) ? 'checked' : '' }}
                                            onchange="document.getElementById('filterForm').submit()">
                                        <span>In stock
                                            ({{ $products->where('status', 'active')->where('stock', '>', 0)->count() }})</span>
                                    </label>
                                    <label class="filter-option">
                                        <input type="checkbox" name="availability[]" value="out_of_stock"
                                            {{ is_array(request('availability')) && in_array('out_of_stock', request('availability')) ? 'checked' : '' }}
                                            onchange="document.getElementById('filterForm').submit()">
                                        {{-- <span>Out of stock
                                            ({{ $products->where('status', 'sold_out')->orWhere('stock', '<=', 0)->count() }})</span> --}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Price Filter -->
                        <div class="filter-dropdown-wrapper">
                            <button type="button" class="filter-btn" id="priceFilter">
                                Price
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </button>
                            <div class="filter-dropdown" id="priceDropdown">
                                <div class="filter-dropdown-header">
                                    <span class="filter-info">The highest price is ${{ number_format($maxPrice, 2) }}</span>
                                    <button type="button" class="filter-reset-btn" onclick="resetPrice()">Reset</button>
                                </div>
                                <div class="filter-price-inputs">
                                    <div class="price-input-group">
                                        <span class="price-currency">$</span>
                                        <input type="number" placeholder="From" class="price-input" name="price_from"
                                            value="{{ request('price_from') }}" id="priceFrom">
                                    </div>
                                    <div class="price-input-group">
                                        <span class="price-currency">$</span>
                                        <input type="number" placeholder="To" class="price-input" name="price_to"
                                            value="{{ request('price_to') }}" id="priceTo">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-dark mt-2 w-100">Apply</button>
                            </div>
                        </div>

                        <!-- Brand Filter -->
                        @if ($brands->count() > 0)
                            <div class="filter-dropdown-wrapper">
                                <button type="button" class="filter-btn" id="brandFilter">
                                    Brand
                                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                </button>
                                <div class="filter-dropdown" id="brandDropdown">
                                    <div class="filter-dropdown-header">
                                        <span class="filter-selected-count">{{ request()->has('brand_id') ? 1 : 0 }}
                                            selected</span>
                                        <button type="button" class="filter-reset-btn"
                                            onclick="resetBrand()">Reset</button>
                                    </div>
                                    <div class="filter-options" style="max-height: 300px; overflow-y: auto;">
                                        @foreach ($brands as $brand)
                                            <label class="filter-option">
                                                <input type="radio" name="brand_id" value="{{ $brand->id }}"
                                                    {{ request('brand_id') == $brand->id ? 'checked' : '' }}
                                                    onchange="document.getElementById('filterForm').submit()">
                                                <span>{{ $brand->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="sort-group">
                        <span class="sort-label">Sort by:</span>
                        <div class="sort-dropdown-wrapper">
                            <button type="button" class="sort-btn" id="sortBtn">
                                {{ match (request('sort', 'featured')) {
                                    'best_selling' => 'Best selling',
                                    'alpha_asc' => 'Alphabetically, A-Z',
                                    'alpha_desc' => 'Alphabetically, Z-A',
                                    'price_asc' => 'Price, low to high',
                                    'price_desc' => 'Price, high to low',
                                    'date_desc' => 'Date, old to new',
                                    'date_asc' => 'Date, new to old',
                                    default => 'Featured',
                                } }}
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </button>
                            <div class="sort-dropdown" id="sortDropdown">
                                <label class="sort-option">
                                    <input type="radio" name="sort" value="featured"
                                        {{ request('sort') == 'featured' || !request('sort') ? 'checked' : '' }}
                                        onchange="document.getElementById('filterForm').submit()">
                                    <span>Featured</span>
                                </label>
                                <label class="sort-option">
                                    <input type="radio" name="sort" value="best_selling"
                                        {{ request('sort') == 'best_selling' ? 'checked' : '' }}
                                        onchange="document.getElementById('filterForm').submit()">
                                    <span>Best selling</span>
                                </label>
                                <label class="sort-option">
                                    <input type="radio" name="sort" value="alpha_asc"
                                        {{ request('sort') == 'alpha_asc' ? 'checked' : '' }}
                                        onchange="document.getElementById('filterForm').submit()">
                                    <span>Alphabetically, A-Z</span>
                                </label>
                                <label class="sort-option">
                                    <input type="radio" name="sort" value="alpha_desc"
                                        {{ request('sort') == 'alpha_desc' ? 'checked' : '' }}
                                        onchange="document.getElementById('filterForm').submit()">
                                    <span>Alphabetically, Z-A</span>
                                </label>
                                <label class="sort-option">
                                    <input type="radio" name="sort" value="price_asc"
                                        {{ request('sort') == 'price_asc' ? 'checked' : '' }}
                                        onchange="document.getElementById('filterForm').submit()">
                                    <span>Price, low to high</span>
                                </label>
                                <label class="sort-option">
                                    <input type="radio" name="sort" value="price_desc"
                                        {{ request('sort') == 'price_desc' ? 'checked' : '' }}
                                        onchange="document.getElementById('filterForm').submit()">
                                    <span>Price, high to low</span>
                                </label>
                                <label class="sort-option">
                                    <input type="radio" name="sort" value="date_desc"
                                        {{ request('sort') == 'date_desc' ? 'checked' : '' }}
                                        onchange="document.getElementById('filterForm').submit()">
                                    <span>Date, old to new</span>
                                </label>
                                <label class="sort-option">
                                    <input type="radio" name="sort" value="date_asc"
                                        {{ request('sort') == 'date_asc' ? 'checked' : '' }}
                                        onchange="document.getElementById('filterForm').submit()">
                                    <span>Date, new to old</span>
                                </label>
                            </div>
                        </div>
                        <span class="product-count">{{ $products->total() }} products</span>
                    </div>
                </div>
            </form>
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
                                        <img src="{{ asset('assets/images/placeholder.jpg') }}"
                                            alt="{{ $product->name }}" class="product-image">
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
                        <p class="text-muted">No products found.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($products->hasPages())
                <div class="pagination-wrapper mt-4">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Filter Dropdowns
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const dropdown = this.nextElementSibling;
                const allDropdowns = document.querySelectorAll('.filter-dropdown');

                allDropdowns.forEach(d => {
                    if (d !== dropdown) d.classList.remove('active');
                });

                dropdown.classList.toggle('active');
            });
        });

        // Sort Dropdown
        document.getElementById('sortBtn').addEventListener('click', function(e) {
            e.stopPropagation();
            document.getElementById('sortDropdown').classList.toggle('active');
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function() {
            document.querySelectorAll('.filter-dropdown, .sort-dropdown').forEach(d => {
                d.classList.remove('active');
            });
        });

        // Prevent dropdown close when clicking inside
        document.querySelectorAll('.filter-dropdown, .sort-dropdown').forEach(dropdown => {
            dropdown.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });

        function resetAvailability() {
            document.querySelectorAll('input[name="availability[]"]').forEach(input => input.checked = false);
            document.getElementById('filterForm').submit();
        }

        function resetPrice() {
            document.getElementById('priceFrom').value = '';
            document.getElementById('priceTo').value = '';
            document.getElementById('filterForm').submit();
        }

        function resetBrand() {
            document.querySelectorAll('input[name="brand_id"]').forEach(input => input.checked = false);
            document.getElementById('filterForm').submit();
        }
    </script>
@endpush
