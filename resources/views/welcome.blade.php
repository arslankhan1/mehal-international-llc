<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mehal International LLC.</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts - Assistant -->
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Announcement Slider Banner -->
    <div class="announcement-slider">
        <div class="announcement-content">
            <button class="slider-btn prev">‹</button>
            <p class="announcement-text">Questions? Contact us at <a
                    href="mailto:customerservice@mehalintl.com">customerservice@mehalintl.com</a> →</p>
            <button class="slider-btn next">›</button>
        </div>
    </div>

    <!-- Header with Logo -->
    <header class="site-header">
        <div class="container-fluid">
            <div class="header-wrapper">
                <!-- Search Icon -->
                <button class="icon-btn search-trigger" id="searchBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>

                <!-- Logo Center -->
                <a href="/" class="logo">
                    <svg width="40" height="50" viewBox="0 0 40 50" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <text x="20" y="35" font-family="Assistant, serif" font-size="32" font-weight="400"
                            text-anchor="middle" fill="#000">M</text>
                        <path d="M20 45 L20 48 M15 48 L25 48" stroke="#000" stroke-width="1.5" />
                    </svg>
                </a>

                <!-- User & Cart Icons -->
                <div class="header-icons">
                    <a href="#" class="icon-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>
                    <a href="#" class="icon-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation Menu -->
    <nav class="main-nav">
        <ul class="nav-menu">
            <li><a href="/" class="nav-link active">Home</a></li>
            <li><a href="/sales-channels" class="nav-link">Sales Channels</a></li>
            <li><a href="/brands" class="nav-link">Brands We Carry</a></li>
            <li><a href="/contact" class="nav-link">Contact</a></li>
        </ul>
    </nav>

    <!-- Search Modal -->
    <div class="search-modal" id="searchModal">
        <div class="search-modal-content">
            <div class="search-input-wrapper">
                <input type="text" class="search-input" placeholder="Search">
                <button class="search-submit-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>
                <button class="search-close-btn" id="searchCloseBtn">✕</button>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Mehal International LLC.</h1>
                <p class="hero-description">With our diverse sales channels and exceptional customer service,
                    partnering with us is a no-brainer for brands looking to expand their reach and provide top-notch
                    experiences to their customers.</p>
            </div>
        </div>
    </section>

    <!-- Feature Cards Section -->
    <section class="features-section">
        <div class="container">
            <!-- Card 1 - Angled Image Left -->
            <div class="feature-card">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="feature-image-wrapper">
                            <div class="angled-image-container">
                                <img src="//mehalintl.com/cdn/shop/files/rupixen-com-Q59HmzK38eQ-unsplash.jpg?v=1690491497&width=1500"
                                    alt="Advertising" class="angled-image">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-text">
                            <h2>Effective Conversion-Oriented Advertising</h2>
                            <p>We allocate our own marketing budget to create tailored advertising campaigns for your
                                brand on Amazon, elevating your sales and establishing your products as market leaders,
                                outshining your competitors.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 - Angled Image Right -->
            <div class="feature-card">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="feature-image-wrapper">
                            <div class="angled-image-container right">
                                <img src="//mehalintl.com/cdn/shop/files/nisonco-pr-and-seo-yIRdUr6hIvQ-unsplash.jpg?v=1690491558&width=1500"
                                    alt="SEO Optimization" class="angled-image">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="feature-text">
                            <h2>Are your product listings optimized for peak sales performance?</h2>
                            <p>Let us conduct a comprehensive Listing Audit to identify areas for improvement. Our
                                skilled design team will then handle the implementation of these enhancements, ensuring
                                your Amazon listings reach their full potential.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 - Angled Image Left -->
            <div class="feature-card">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="feature-image-wrapper">
                            <div class="angled-image-container">
                                <img src="//mehalintl.com/cdn/shop/files/anirudh-wKeZstqxKTQ-unsplash.jpg?v=1690491622&width=1500"
                                    alt="Amazon Mastery" class="angled-image">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-text">
                            <h2>Mastering Amazon for You:</h2>
                            <p>We grasp the intricacies of selling on Amazon, saving you the hassle. Allow us to excel
                                at what we do best - boosting your Amazon sales - while you concentrate on your
                                expertise - crafting exceptional products.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content">
                <h2>Subscribe to our emails</h2>
                <p>Subscribe to our mailing list for news, new brands, and partnership opportunities.</p>
                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form">
                    @csrf
                    <div class="newsletter-input-group">
                        <input type="email" name="email" placeholder="Email" required>
                        <button type="submit">→</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>GET IN TOUCH</h3>
                    <p><strong>EMAIL</strong> <a
                            href="mailto:Customerservice@mehalintl.com">Customerservice@mehalintl.com</a></p>
                    <p><strong>Phone</strong> <a href="tel:(469)767-7626">(469) 767-7626</a></p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>COPYRIGHT ©2023 Mehal International LLC., All Rights Reserved</p>
                <div class="payment-icons">
                    <span>💳 PayPal</span>
                    <span>💳 Venmo</span>
                </div>
                <p class="copyright-year">© 2026, <a href="/">Mehal International LLC.</a></p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
