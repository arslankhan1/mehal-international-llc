<!-- Announcement Slider Banner -->
<div class="announcement-slider">
    <div class="announcement-content">
        <button class="slider-btn prev">‹</button>
        <p class="announcement-text">Questions? Contact us at <a
                href="mailto:customerservice@mehalintl.com">customerservice@mehalintl.com</a>
            <span class="fs-">
                <svg viewBox="0 0 14 10" fill="none" aria-hidden="true" style="width:13px;" focusable="false"
                    class="icon icon-arrow" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.537.808a.5.5 0 01.817-.162l4 4a.5.5 0 010 .708l-4 4a.5.5 0 11-.708-.708L11.793 5.5H1a.5.5 0 010-1h10.793L8.646 1.354a.5.5 0 01-.109-.546z"
                        fill="currentColor">
                    </path>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
            </button>

            <!-- Logo Center -->
            <a href="/" class="logo">
                <img class="w-20" src="{{ asset('assets/images/logo.png') }}" alt="">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-bag-dash" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M5.5 10a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5" />
                        <path
                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
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
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
            </button>
            <button class="search-close-btn" id="searchCloseBtn">✕</button>
        </div>
    </div>
</div>


