<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Channels - Mehal International LLC.</title>

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
                    href="mailto:customerservice@mehalintl.com">customerservice@mehalintl.com</a>
                <span>
                    <svg viewBox="0 0 14 10" fill="none" aria-hidden="true" style="width:13px;" focusable="false"
                        class="icon icon-arrow" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.537.808a.5.5 0 01.817-.162l4 4a.5.5 0 010 .708l-4 4a.5.5 0 11-.708-.708L11.793 5.5H1a.5.5 0 010-1h10.793L8.646 1.354a.5.5 0 01-.109-.546z"
                            fill="currentColor"></path>
                    </svg>
                </span>
            </p>
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
                    <img class="w-25" src="{{ asset('assets/images/logo.png') }}" alt="Mehal International LLC.">
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
            <li><a href="/" class="nav-link">Home</a></li>
            <li><a href="/sales-channels" class="nav-link active">Sales Channels</a></li>
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

    <!-- Page Title Section -->
    <section class="page-title-section">
        <div class="container">
            <h1 class="page-title">Sales Channels</h1>
        </div>
    </section>

    <section class="sales-channels-section">
        <div class="container">

            <!-- Card 1: Image left / Text right -->
            <article class="channel-card-split">
                <div class="channel-split-media">
                    <img src="https://mehalintl.com/cdn/shop/files/Eyebrow_Express_Logo.jpg?v=1690496830&width=750"
                        alt="Eyebrow Express" />
                </div>

                <div class="channel-split-content">
                    <div class="channel-kicker">BRICK & MORTAR</div>
                    <h2 class="channel-split-title">Eyebrow Express</h2>
                    <p class="channel-split-desc">Full-service salon, serving the DFW Metroplex since 2010.</p>
                </div>
            </article>

            <!-- Card 2: Text left / Image right -->
            <article class="channel-card-split reverse">
                <div class="channel-split-media">
                    <img src="https://mehalintl.com/cdn/shop/files/christian-wiediger-rymh7EZPqRs-unsplash_2.jpg?v=1690497027&width=750"
                        alt="Amazon" />
                </div>

                <div class="channel-split-content">
                    <div class="channel-kicker">ONLINE</div>
                    <h2 class="channel-split-title">Amazon</h2>
                    <p class="channel-split-desc">
                        We pride ourselves in the diversity in product found on our Amazon catalog, ranging from
                        household goods to toys and electronics.
                    </p>
                </div>
            </article>

            <!-- Card 3: Text left / Image right -->

            <article class="channel-card-split">
                <div class="channel-split-media">
                    <img src="https://mehalintl.com/cdn/shop/files/Untitled_design.png?v=1690498125&width=750"
                        alt="Eyebrow Express" />
                </div>

                <div class="channel-split-content">
                    <div class="channel-kicker">ONLINE</div>
                    <h2 class="channel-split-title">TapeandToner.com</h2>
                    <p class="channel-split-desc">Coming soon! Serving local business with all office supply needs,
                        from writing utensils to
                        networking solutions.</p>
                </div>
            </article>

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
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
