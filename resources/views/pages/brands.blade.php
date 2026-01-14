```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brands We Carry - Mehal International LLC.</title>

    <!-- Bootstrap (only for your existing header container-fluid, not for the grid layout) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Google Fonts - Assistant -->
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Your stylesheet (keep if you want; below also includes the full CSS) -->
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->

    <style>
        /* ============================================
       MEHAL INTERNATIONAL LLC - PIXEL PERFECT CLONE
       Header/Nav/Newsletter/Footer retained from your code
       Brands grid rebuilt to match screenshot (Collections grid)
       ============================================ */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --announcement-bg: rgb(43, 51, 47);
            --hero-bg: rgb(43, 51, 47);
            --body-bg: #f5f3f0;
            --card-bg: #ffffff;
            --newsletter-bg: rgb(43, 51, 47);
            --footer-bg: rgb(43, 51, 47);
            --text-dark: #000000;
            --text-light: #ffffff;
            --border-color: #e5e5e5;

            --text-boxes-shadow-horizontal-offset: 0px;
            --text-boxes-shadow-vertical-offset: 4px;
            --text-boxes-shadow-blur-radius: 5px;
            --color-shadow: 37, 37, 37;
            --text-boxes-shadow-opacity: 0.85;
        }

        html {
            font-size: 62.5%;
        }

        body {
            font-family: 'Assistant', sans-serif;
            font-size: 1.6rem;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--body-bg);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* ============================================
       ANNOUNCEMENT SLIDER
       ============================================ */
        .announcement-slider {
            background-color: var(--announcement-bg);
            padding: 0.8rem 0;
            position: relative;
        }

        .announcement-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 3rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .announcement-text {
            color: var(--text-light);
            font-size: 1.3rem;
            font-weight: 400;
            letter-spacing: 0.02em;
            margin: 0;
            text-align: center;
            line-height: 1.4;
        }

        .announcement-text a {
            color: var(--text-light);
            text-decoration: none;
            transition: opacity 0.2s;
        }

        .announcement-text a:hover {
            opacity: 0.8;
        }

        .announcement-text svg {
            vertical-align: middle;
            margin-left: 0.3rem;
        }

        .slider-btn {
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.7);
            font-size: 2.4rem;
            cursor: pointer;
            padding: 0 1rem;
            transition: opacity 0.2s;
            line-height: 1;
        }

        .slider-btn:hover {
            opacity: 1;
            color: rgba(255, 255, 255, 1);
        }

        /* ============================================
       HEADER
       ============================================ */
        .site-header {
            background-color: var(--body-bg);
            padding: 2rem 0;
            border-bottom: 1px solid var(--border-color);
        }

        .header-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 4rem;
            position: relative;
        }

        .icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.8rem;
            color: var(--text-dark);
            transition: opacity 0.2s;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-btn:hover {
            opacity: 0.6;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .logo img {
            max-height: 5rem;
            width: auto;
        }

        .header-icons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        /* ============================================
       NAVIGATION
       ============================================ */
        .main-nav {
            background-color: var(--body-bg);
            padding: 1.2rem 0;
            border-bottom: 1px solid var(--border-color);
        }

        .nav-menu {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 3.5rem;
            margin: 0;
            padding: 0;
            flex-wrap: wrap;
        }

        .nav-link {
            color: var(--text-dark);
            text-decoration: none;
            font-size: 1.4rem;
            font-weight: 400;
            transition: opacity 0.2s;
            position: relative;
            padding-bottom: 0.3rem;
        }

        .nav-link:hover {
            opacity: 0.6;
        }

        .nav-link.active {
            opacity: 1;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--text-dark);
        }

        /* ============================================
       SEARCH MODAL
       ============================================ */
        .search-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 9999;
            backdrop-filter: blur(4px);
        }

        .search-modal.active {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-top: 15rem;
        }

        .search-modal-content {
            background-color: var(--body-bg);
            padding: 0;
            border-radius: 0;
            max-width: 60rem;
            width: 100%;
            margin: 0 2rem;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.3);
        }

        .search-input-wrapper {
            display: flex;
            align-items: center;
            border: 1px solid var(--text-dark);
            padding: 1.5rem 2rem;
            gap: 1rem;
            background: var(--body-bg);
        }

        .search-input {
            flex: 1;
            border: none;
            background: none;
            font-size: 1.6rem;
            font-family: 'Assistant', sans-serif;
            outline: none;
            color: var(--text-dark);
        }

        .search-input::placeholder {
            color: rgba(0, 0, 0, 0.5);
        }

        .search-submit-btn,
        .search-close-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            color: var(--text-dark);
            font-size: 2rem;
            transition: opacity 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-submit-btn:hover,
        .search-close-btn:hover {
            opacity: 0.6;
        }

        /* ============================================
       UTILITIES
       ============================================ */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        @media (max-width: 767px) {
            .container {
                padding: 0 1.5rem;
            }
        }

        /* ============================================
       BRANDS WE CARRY - MATCH SCREENSHOT (Collections Grid)
       ============================================ */

        .page-title-section {
            background-color: var(--body-bg);
            padding: 5.2rem 0 2.2rem;
            text-align: center;
        }

        .page-title {
            font-family: Georgia, "Times New Roman", Times, serif;
            font-size: 3.8rem;
            font-weight: 400;
            color: rgba(0, 0, 0, 0.72);
            margin: 0;
            line-height: 1.2;
        }

        .collections-label-section {
            background-color: var(--body-bg);
            padding: 1.6rem 0 1.6rem;
        }

        .collections-label-section .container {
            max-width: 980px;
        }

        .collections-label {
            font-family: Georgia, "Times New Roman", Times, serif;
            font-size: 1.8rem;
            font-weight: 400;
            color: rgba(0, 0, 0, 0.62);
            margin: 0;
        }

        .brands-grid-section {
            background-color: var(--body-bg);
            padding: 0 0 6.2rem;
        }

        .brands-grid-section .container {
            max-width: 980px;
        }

        .brands-collections-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.6rem;
        }

        .brand-tile {
            display: block;
            text-decoration: none;
            color: inherit;
        }

        .brand-tile-image {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.08);
            aspect-ratio: 1 / 1;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Screenshot look = cropped/zoomed logos */
        .brand-tile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        .brand-tile-meta {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.9rem 0.2rem 0;
        }

        .brand-tile-name {
            font-size: 1.05rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: rgba(0, 0, 0, 0.55);
        }

        .brand-tile-arrow {
            font-size: 1.15rem;
            color: rgba(0, 0, 0, 0.55);
            transform: translateY(-0.5px);
        }

        .brand-tile:hover .brand-tile-name,
        .brand-tile:hover .brand-tile-arrow {
            color: rgba(0, 0, 0, 0.75);
        }

        /* Responsive (Shopify-like) */
        @media (max-width: 991px) {
            .header-wrapper {
                padding: 0 2rem;
            }
        }

        @media (max-width: 767px) {
            html {
                font-size: 56.25%;
            }

            .header-wrapper {
                padding: 0 1.5rem;
            }

            .logo {
                position: static;
                transform: none;
            }

            .nav-menu {
                gap: 2rem;
            }

            .brands-collections-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .page-title {
                font-size: 3.0rem;
            }
        }

        @media (max-width: 575px) {
            .announcement-content {
                padding: 0 1rem;
                gap: 1rem;
            }

            .announcement-text {
                font-size: 1.2rem;
            }

            .header-wrapper {
                padding: 0 1.5rem;
                flex-wrap: wrap;
                justify-content: center;
            }

            .logo {
                order: -1;
                margin-bottom: 1rem;
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 420px) {
            .brands-collections-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ============================================
       NEWSLETTER SECTION
       ============================================ */
        .newsletter-section {
            background-color: var(--newsletter-bg);
            padding: 8rem 0;
            text-align: center;
        }

        .newsletter-content {
            max-width: 60rem;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .newsletter-content h2 {
            font-size: 3rem;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 1.5rem;
        }

        .newsletter-content p {
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.75);
            margin-bottom: 3rem;
            line-height: 1.6;
        }

        .newsletter-input-group {
            display: flex;
            max-width: 50rem;
            margin: 0 auto;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.05);
        }

        .newsletter-input-group input {
            flex: 1;
            padding: 1.4rem 1.8rem;
            border: none;
            background: transparent;
            color: var(--text-light);
            font-size: 1.5rem;
            font-family: 'Assistant', sans-serif;
            outline: none;
        }

        .newsletter-input-group input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .newsletter-input-group button {
            padding: 1.4rem 2.5rem;
            border: none;
            background: transparent;
            color: var(--text-light);
            font-size: 2rem;
            cursor: pointer;
            transition: opacity 0.2s, background-color 0.2s;
        }

        .newsletter-input-group button:hover {
            opacity: 0.8;
            background: rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 767px) {
            .newsletter-section {
                padding: 5rem 0;
            }

            .newsletter-content h2 {
                font-size: 2.4rem;
            }

            .newsletter-input-group {
                flex-direction: column;
            }

            .newsletter-input-group button {
                width: 100%;
                padding: 1.5rem;
            }
        }

        /* ============================================
       FOOTER
       ============================================ */
        .site-footer {
            background-color: var(--footer-bg);
            padding: 6rem 0 3rem;
            color: var(--text-light);
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto 4rem;
            padding: 0 4rem;
        }

        .footer-section h3 {
            font-size: 1.3rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-bottom: 2rem;
            color: rgba(255, 255, 255, 0.95);
        }

        .footer-section p {
            font-size: 1.4rem;
            margin-bottom: 1rem;
            color: rgba(255, 255, 255, 0.75);
            line-height: 1.6;
        }

        .footer-section strong {
            font-weight: 600;
            margin-right: 0.5rem;
        }

        .footer-section a {
            color: var(--text-light);
            text-decoration: underline;
            transition: opacity 0.2s;
        }

        .footer-section a:hover {
            opacity: 0.7;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            padding-top: 3rem;
            text-align: center;
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 4rem;
            padding-right: 4rem;
        }

        .footer-bottom p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.55);
            margin-bottom: 1.5rem;
        }

        .payment-icons {
            display: flex;
            gap: 2rem;
            justify-content: center;
            margin: 2rem 0;
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .copyright-year {
            margin-top: 2rem;
        }

        .copyright-year a {
            color: var(--text-light);
            text-decoration: underline;
        }

        @media (max-width: 991px) {

            .footer-content,
            .footer-bottom {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Announcement Slider Banner -->
    <div class="announcement-slider">
        <div class="announcement-content">
            <button class="slider-btn prev">‹</button>
            <p class="announcement-text">
                Questions? Contact us at
                <a href="mailto:customerservice@mehalintl.com">customerservice@mehalintl.com</a>
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
                <button class="icon-btn search-trigger" id="searchBtn" type="button" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>

                <!-- Logo Center -->
                <a href="/" class="logo">
                    <img class="w-25" src="{{ asset('assets/images/logo.png') }}" alt="Mehal International LLC." />
                </a>

                <!-- User & Cart Icons -->
                <div class="header-icons">
                    <a href="#" class="icon-btn" aria-label="Account">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>
                    <a href="#" class="icon-btn" aria-label="Cart">
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
            <li><a href="/sales-channels" class="nav-link">Sales Channels</a></li>
            <li><a href="/brands" class="nav-link active">Brands We Carry</a></li>
            <li><a href="/contact" class="nav-link">Contact</a></li>
        </ul>
    </nav>

    <!-- Search Modal -->
    <div class="search-modal" id="searchModal" aria-hidden="true">
        <div class="search-modal-content">
            <div class="search-input-wrapper">
                <input type="text" class="search-input" placeholder="Search" />
                <button class="search-submit-btn" type="button" aria-label="Submit search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>
                <button class="search-close-btn" id="searchCloseBtn" type="button"
                    aria-label="Close search">✕</button>
            </div>
        </div>
    </div>

    <!-- Page Title -->
    <section class="page-title-section">
        <div class="container">
            <h1 class="page-title">Brands We Carry</h1>
        </div>
    </section>

    <!-- Collections Label -->
    <section class="collections-label-section">
        <div class="container">
            <h2 class="collections-label">Collections</h2>
        </div>
    </section>

    <!-- Collections Grid (MATCH SCREENSHOT STYLE) -->
    <section class="brands-grid-section">
        <div class="container">
            <div class="brands-collections-grid">

                {{-- <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/24/LEGO_logo.svg" alt="LEGO">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">LEGO</span><span
                            class="brand-tile-arrow">→</span></div>
                </a> --}}
                <a class="brand-card" href="#">
                    <div class="brand-card__media">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/24/LEGO_logo.svg" alt="LEGO">
                    </div>

                    <div class="brand-card__footer">
                        <span class="brand-card__name">LEGO</span>
                        <span class="brand-card__arrow">→</span>
                    </div>
                </a>


                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/36/Fisher-Price_logo.svg"
                            alt="Fisher Price">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">FISHER PRICE</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3b/Nerf_logo.png" alt="Nerf">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">NERF</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5d/NOVA_logo.png" alt="ANOVA">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">ANOVA</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/84/Carrier_logo.svg"
                            alt="Carrier">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">CARRIER</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Adidas_Logo.svg" alt="Adidas">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">ADIDAS</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Columbia_Sportswear_text_logo.svg"
                            alt="Columbia">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">COLUMBIA</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/KISS_Logo.svg" alt="KISS">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">KISS</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/c4/Champion_logo.svg"
                            alt="Champion">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">CHAMPION</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d9/Callaway_Golf_Company_logo.svg"
                            alt="Callaway">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">CALLAWAY</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7b/Crock-Pot_logo.svg"
                            alt="Crockpot">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">CROCKPOT</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9f/DASH_logo.png" alt="Dash">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">DASH</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Degree_Logo.svg" alt="Degree">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">DEGREE</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7e/Disney_wordmark.svg"
                            alt="Disney">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">DISNEY</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/0d/Folgers_logo.svg"
                            alt="Folgers">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">FOLGERS</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Insignia_logo.svg"
                            alt="Insignia">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">INSIGNIA</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Microsoft_logo_%282012%29.svg"
                            alt="Microsoft">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">MICROSOFT</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Mega_Blocks_logo.svg"
                            alt="Mega Construx">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">MEGA CONSTRUX</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7f/Nature%27s_Bounty_logo.svg"
                            alt="Nature's Bounty">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">NATURE'S BOUNTY</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/84/Peet%27s_Coffee_logo.svg"
                            alt="Peet's Coffee">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">PEET'S COFFEE</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/ea/New_Balance_logo.svg"
                            alt="New Balance">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">NEW BALANCE</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/Neutrogena_logo.svg"
                            alt="Neutrogena">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">NEUTROGENA</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6a/Old_Spice_logo.svg"
                            alt="Old Spice">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">OLD SPICE</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" alt="Nike">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">NIKE</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/e8/Under_Armour_Logo.svg"
                            alt="Under Armour">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">UNDER ARMOUR</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2c/Van_Heusen_logo.svg"
                            alt="Van Heusen">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">VAN HEUSEN</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

                <a class="brand-tile" href="#">
                    <div class="brand-tile-image">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/1b/Voluspa_logo.png"
                            alt="Voluspa">
                    </div>
                    <div class="brand-tile-meta"><span class="brand-tile-name">VOLUSPA</span><span
                            class="brand-tile-arrow">→</span></div>
                </a>

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
                        <input type="email" name="email" placeholder="Email" required />
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

    <script>
        // Search modal behavior (matches your existing IDs/classes)
        const searchBtn = document.getElementById('searchBtn');
        const searchModal = document.getElementById('searchModal');
        const searchCloseBtn = document.getElementById('searchCloseBtn');

        if (searchBtn && searchModal) {
            searchBtn.addEventListener('click', () => {
                searchModal.classList.add('active');
                searchModal.setAttribute('aria-hidden', 'false');
            });
        }
        if (searchCloseBtn && searchModal) {
            searchCloseBtn.addEventListener('click', () => {
                searchModal.classList.remove('active');
                searchModal.setAttribute('aria-hidden', 'true');
            });
        }
        if (searchModal) {
            searchModal.addEventListener('click', (e) => {
                if (e.target === searchModal) {
                    searchModal.classList.remove('active');
                    searchModal.setAttribute('aria-hidden', 'true');
                }
            });
        }
    </script>
</body>

</html>
```
