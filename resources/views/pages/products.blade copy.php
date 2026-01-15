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
            <div class="filter-sort-bar">
                <div class="filter-group">
                    <span class="filter-label">Filter:</span>

                    <!-- Availability Filter -->
                    <div class="filter-dropdown-wrapper">
                        <button class="filter-btn" id="availabilityFilter">
                            Availability
                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </button>
                        <div class="filter-dropdown" id="availabilityDropdown">
                            <div class="filter-dropdown-header">
                                <span class="filter-selected-count">0 selected</span>
                                <button class="filter-reset-btn">Reset</button>
                            </div>
                            <div class="filter-options">
                                <label class="filter-option">
                                    <input type="checkbox" name="availability" value="in_stock">
                                    <span>In stock (0)</span>
                                </label>
                                <label class="filter-option">
                                    <input type="checkbox" name="availability" value="out_of_stock">
                                    <span>Out of stock (20)</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div class="filter-dropdown-wrapper">
                        <button class="filter-btn" id="priceFilter">
                            Price
                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </button>
                        <div class="filter-dropdown" id="priceDropdown">
                            <div class="filter-dropdown-header">
                                <span class="filter-info">The highest price is $168.99</span>
                                <button class="filter-reset-btn">Reset</button>
                            </div>
                            <div class="filter-price-inputs">
                                <div class="price-input-group">
                                    <span class="price-currency">$</span>
                                    <input type="number" placeholder="From" class="price-input" id="priceFrom">
                                </div>
                                <div class="price-input-group">
                                    <span class="price-currency">$</span>
                                    <input type="number" placeholder="To" class="price-input" id="priceTo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sort-group">
                    <span class="sort-label">Sort by:</span>
                    <div class="sort-dropdown-wrapper">
                        <button class="sort-btn" id="sortBtn">
                            Alphabetically, A-Z
                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </button>
                        <div class="sort-dropdown" id="sortDropdown">
                            <label class="sort-option">
                                <input type="radio" name="sort" value="featured" checked>
                                <span>Featured</span>
                            </label>
                            <label class="sort-option">
                                <input type="radio" name="sort" value="best_selling">
                                <span>Best selling</span>
                            </label>
                            <label class="sort-option">
                                <input type="radio" name="sort" value="alpha_asc">
                                <span>Alphabetically, A-Z</span>
                            </label>
                            <label class="sort-option">
                                <input type="radio" name="sort" value="alpha_desc">
                                <span>Alphabetically, Z-A</span>
                            </label>
                            <label class="sort-option">
                                <input type="radio" name="sort" value="price_asc">
                                <span>Price, low to high</span>
                            </label>
                            <label class="sort-option">
                                <input type="radio" name="sort" value="price_desc">
                                <span>Price, high to low</span>
                            </label>
                            <label class="sort-option">
                                <input type="radio" name="sort" value="date_desc">
                                <span>Date, old to new</span>
                            </label>
                            <label class="sort-option">
                                <input type="radio" name="sort" value="date_asc">
                                <span>Date, new to old</span>
                            </label>
                        </div>
                    </div>
                    <span class="product-count">20 products</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="products-grid-section">
        <div class="container">
            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/1" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/1.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Sinnoa K. Hatsumana (Vinyl) Capitol multivolt</h3>
                                <p class="product-price">$27.50 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 2 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/2" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/2.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Folgers K-Cups Breakfast Blend, 12 Count (Pack of 6)</h3>
                                <p class="product-price">$41.76 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 3 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/3" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/3.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Insignia - NS-HAWHP2 RF Wireless Over-Ear 2.4 Headphones - Black
                                </h3>
                                <p class="product-price">$124.81 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 4 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/4" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/4.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">LEGO Disney Princess Belle and The Beast's Castle 43196 Building
                                    Toy Set for Kids, Girls, and Boys Ages 8+ (505 Pieces)</h3>
                                <p class="product-price">$76.99 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 5 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/5" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/5.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">LEGO DOTS Adhesive Patches Mega Pack 41957 5in1 Set, DIY Stickers
                                    Kids' Mosaic Crafts Kit, Personalized Decoration for Notebooks, Phone Cases or Room
                                    Décor</h3>
                                <p class="product-price">$27.22 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 6 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/6" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/6.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">LEGO Friends Andrea's Theater School 41714 Building Toy Set for
                                    Kids, Girls, and Boys Ages 8+ (1,154 Pieces)</h3>
                                <p class="product-price">$99.99 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 7 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/7" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/7.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">LEGO Friends Beach Glamping 41700 Building Kit; Creative Girl &
                                    Boy Toys for Ages 6+ (380 Pieces)</h3>
                                <p class="product-price">$37.99 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 8 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/8" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/8.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">LEGO Friends Magical Carnival 41685 Building Kit; Magic Carnival
                                    Creative Toy Set with 6 Mini Cute Vehicles; New 2021 (340 Pieces)</h3>
                                <p class="product-price">$40.50 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 9 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/9" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/9.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">LEGO Friends Magical Carnival 41686 Building Kit; Magic Carnival
                                    Rides; New 2021 (340 Pieces)</h3>
                                <p class="product-price">$33.99 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 10 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/10" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/10.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">LEGO Marvel The Goat Boat 76208 Building Set - Thor Set with Toy
                                    Ship, Stormbreaker, and Movie Inspired Thor, Korg, and Valkyrie Minifigures, Avengers
                                    Gifts for Kids, Boys, and Girls Ages 8+</h3>
                                <p class="product-price">$47.44 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 11 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/11" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/11.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Nature's Bounty Milk Thistle 1000 mg, 60 Softgels (1 Pack) (50
                                    Count)</h3>
                                <p class="product-price">$35.50 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 12 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/12" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/12.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Nature's Bounty Milk Thistle Capsules for Liver Support, Herbal
                                    Supplement Containing 250 mg per Serving, 200 Count</h3>
                                <p class="product-price">$22.00 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 13 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/13" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/13.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Nature's Bounty Saw Palmetto, Support for Prostate and Urinary
                                    Health, 450mg of Standardized Extract, 250 Softgel Capsules</h3>
                                <p class="product-price">$22.00 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 14 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/14" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/14.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Nature's Bounty Vitamin B-12 Methylcobalamin B12, 1000 mcg, 200
                                    Tablets</h3>
                                <p class="product-price">$21.00 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 15 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/15" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/15.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">NETGEAR 8-Port Gigabit Ethernet Unmanaged Switch (GS308) - Home
                                    Network Hub, Office Ethernet Splitter, Plug-and-Play, Fanless Housing for Quiet
                                    Operation, Desktop or Wall Mount</h3>
                                <p class="product-price">$168.99 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 16 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/16" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/16.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">NETGEAR Nighthawk 8-Stream WiFi Router (C7800) - Compatible with
                                    Cable Plans Up to 400Mbps - DOCSIS 3.1 Gigabit Cable Modem Router Built-In WiFi 6
                                    Spectrum, Cox for Cable Plans</h3>
                                <p class="product-price">$142.99 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 17 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/17" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/17.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Old Spice Body Wash for Men, Aluminum Free, Sea Spray Cologne
                                    Scent, 16.9 Fl Ounce, Pack of 4</h3>
                                <p class="product-price">$35.99 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 18 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/18" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/18.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Old Spice, Beard Balm for Men, 2.22 fl oz</h3>
                                <p class="product-price">$9.98 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 19 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/19" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/19.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Patient Number 9 - Red Colored Vinyl [Vinyl] Ozzy Osbourne</h3>
                                <p class="product-price">$29.99 USD</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Product 20 -->
                <div class="col-lg-3 col-md-6">
                    <a href="/products/20" class="product-card-link">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <span class="sold-out-badge">Sold out</span>
                                <img src="{{ asset('assets/products/20.jpg') }}" alt="Product" class="product-image">
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">Volup Organic & Fair Trade Unsweetened Super Food Cacao Powder
                                </h3>
                                <p class="product-price">$27.00 USD</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper">
                <button class="pagination-btn pagination-prev" disabled>
                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5L5 1L1 5" stroke="currentColor" stroke-width="1.5" />
                    </svg>
                </button>
                <span class="pagination-number active">1</span>
                <span class="pagination-number">2</span>
                <button class="pagination-btn pagination-next">
                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" />
                    </svg>
                </button>
            </div>
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
    </script>
@endpush
