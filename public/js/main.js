// Mehal International LLC - Interactive Features

document.addEventListener("DOMContentLoaded", function () {
    // ============================================
    // ANNOUNCEMENT SLIDER - FIXED VERSION
    // ============================================
    const sliderBtns = document.querySelectorAll(".slider-btn");
    const announcementText = document.querySelector(".announcement-text");

    // Exact announcements with proper HTML
    const announcements = [
        `Questions? Contact us at <a href="mailto:customerservice@mehalintl.com">customerservice@mehalintl.com</a> <svg viewBox="0 0 14 10" fill="none" aria-hidden="true" style="width:13px; display:inline-block; margin-left:3px;" focusable="false" class="icon icon-arrow" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.537.808a.5.5 0 01.817-.162l4 4a.5.5 0 010 .708l-4 4a.5.5 0 11-.708-.708L11.793 5.5H1a.5.5 0 010-1h10.793L8.646 1.354a.5.5 0 01-.109-.546z" fill="currentColor"></path></svg>`,
        `tapeandtoner.com - Coming Soon!`,
        `Free shipping on orders over $50! <svg viewBox="0 0 14 10" fill="none" aria-hidden="true" style="width:13px; display:inline-block; margin-left:3px;" focusable="false" class="icon icon-arrow" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.537.808a.5.5 0 01.817-.162l4 4a.5.5 0 010 .708l-4 4a.5.5 0 11-.708-.708L11.793 5.5H1a.5.5 0 010-1h10.793L8.646 1.354a.5.5 0 01-.109-.546z" fill="currentColor"></path></svg>`,
    ];

    let currentSlide = 0;

    function updateAnnouncement() {
        if (announcementText) {
            // Fade out
            announcementText.style.opacity = "0";

            setTimeout(() => {
                announcementText.innerHTML = announcements[currentSlide];
                // Fade in
                announcementText.style.opacity = "1";
            }, 200);
        }
    }

    // Manual navigation
    sliderBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            if (this.classList.contains("next")) {
                currentSlide = (currentSlide + 1) % announcements.length;
            } else {
                currentSlide =
                    (currentSlide - 1 + announcements.length) %
                    announcements.length;
            }
            updateAnnouncement();
        });
    });

    // Auto-rotate announcements every 5 seconds
    setInterval(() => {
        currentSlide = (currentSlide + 1) % announcements.length;
        updateAnnouncement();
    }, 5000);

    // Set initial transition
    if (announcementText) {
        announcementText.style.transition = "opacity 0.3s ease";
    }

    // ============================================
    // SEARCH MODAL
    // ============================================
    const searchBtn = document.getElementById("searchBtn");
    const searchModal = document.getElementById("searchModal");
    const searchCloseBtn = document.getElementById("searchCloseBtn");
    const searchInput = document.querySelector(".search-input");

    if (searchBtn && searchModal) {
        // Open search modal
        searchBtn.addEventListener("click", function (e) {
            e.preventDefault();
            searchModal.classList.add("active");
            document.body.style.overflow = "hidden"; // Prevent background scroll
            setTimeout(() => {
                if (searchInput) searchInput.focus();
            }, 100);
        });

        // Close search modal
        if (searchCloseBtn) {
            searchCloseBtn.addEventListener("click", function () {
                searchModal.classList.remove("active");
                document.body.style.overflow = ""; // Restore scroll
            });
        }

        // Close on backdrop click
        searchModal.addEventListener("click", function (e) {
            if (e.target === searchModal) {
                searchModal.classList.remove("active");
                document.body.style.overflow = "";
            }
        });

        // Close on Escape key
        document.addEventListener("keydown", function (e) {
            if (
                e.key === "Escape" &&
                searchModal.classList.contains("active")
            ) {
                searchModal.classList.remove("active");
                document.body.style.overflow = "";
            }
        });
    }

    // ============================================
    // SMOOTH SCROLL
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const href = this.getAttribute("href");
            if (href !== "#" && href.length > 1) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });
                }
            }
        });
    });

    // ============================================
    // FORM VALIDATION
    // ============================================
    const newsletterForm = document.querySelector(".newsletter-form");
    if (newsletterForm) {
        newsletterForm.addEventListener("submit", function (e) {
            const emailInput = this.querySelector('input[type="email"]');
            const email = emailInput.value.trim();

            if (!validateEmail(email)) {
                e.preventDefault();
                alert("Please enter a valid email address.");
                emailInput.focus();
                return false;
            }
        });
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // ============================================
    // IMAGE LAZY LOADING
    // ============================================
    if ("IntersectionObserver" in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute("data-src");
                        imageObserver.unobserve(img);
                    }
                }
            });
        });

        document.querySelectorAll("img[data-src]").forEach((img) => {
            imageObserver.observe(img);
        });
    }

    // ============================================
    // ANGLED IMAGE HOVER EFFECT
    // ============================================
    const angledImages = document.querySelectorAll(".angled-image-container");
    angledImages.forEach((container) => {
        const img = container.querySelector(".angled-image");

        if (img) {
            container.addEventListener("mouseenter", function () {
                img.style.transform = "rotate(0deg) scale(1.05)";
            });

            container.addEventListener("mouseleave", function () {
                const isRight = container.classList.contains("right");
                img.style.transform = isRight
                    ? "rotate(5deg) scale(1)"
                    : "rotate(-5deg) scale(1)";
            });
        }
    });

    // ============================================
    // SCROLL TO TOP BUTTON
    // ============================================
    let scrollTopBtn = null;

    function createScrollTopButton() {
        scrollTopBtn = document.createElement("button");
        scrollTopBtn.innerHTML = "↑";
        scrollTopBtn.className = "scroll-top-btn";
        scrollTopBtn.setAttribute("aria-label", "Scroll to top");
        scrollTopBtn.style.cssText = `
            position: fixed;
            bottom: 3rem;
            right: 3rem;
            width: 5rem;
            height: 5rem;
            border-radius: 50%;
            background: rgb(43, 51, 47);
            color: white;
            border: none;
            font-size: 2rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        `;

        scrollTopBtn.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        });

        document.body.appendChild(scrollTopBtn);
    }

    createScrollTopButton();

    window.addEventListener("scroll", () => {
        if (scrollTopBtn) {
            if (window.scrollY > 300) {
                scrollTopBtn.style.opacity = "1";
                scrollTopBtn.style.visibility = "visible";
            } else {
                scrollTopBtn.style.opacity = "0";
                scrollTopBtn.style.visibility = "hidden";
            }
        }
    });

    // ============================================
    // ACTIVE NAVIGATION
    // ============================================
    const currentPage = window.location.pathname;
    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach((link) => {
        const linkHref = link.getAttribute("href");
        // Remove active class from all first
        link.classList.remove("active");

        // Add active to matching link
        if (
            linkHref === currentPage ||
            (currentPage === "/" && linkHref === "/")
        ) {
            link.classList.add("active");
        }
    });

    // ============================================
    // MOBILE MENU
    // ============================================
    function createMobileMenu() {
        const nav = document.querySelector(".main-nav");
        const existingToggle = document.querySelector(".mobile-menu-toggle");

        if (window.innerWidth < 768) {
            if (nav && !existingToggle) {
                const toggle = document.createElement("button");
                toggle.className = "mobile-menu-toggle";
                toggle.innerHTML = "☰";
                toggle.setAttribute("aria-label", "Toggle menu");
                toggle.style.cssText = `
                    display: block;
                    margin: 0 auto 1rem;
                    background: none;
                    border: none;
                    font-size: 2.5rem;
                    cursor: pointer;
                    padding: 1rem;
                    color: #000;
                `;

                const menu = document.querySelector(".nav-menu");

                toggle.addEventListener("click", () => {
                    const isOpen = menu.style.display === "flex";
                    menu.style.display = isOpen ? "none" : "flex";
                    if (!isOpen) {
                        menu.style.flexDirection = "column";
                        menu.style.gap = "1rem";
                    }
                    toggle.innerHTML = isOpen ? "☰" : "✕";
                });

                nav.insertBefore(toggle, menu);
                menu.style.display = "none";
            }
        } else {
            // Desktop view - remove mobile menu
            if (existingToggle) {
                existingToggle.remove();
            }
            const menu = document.querySelector(".nav-menu");
            if (menu) {
                menu.style.display = "flex";
                menu.style.flexDirection = "row";
            }
        }
    }

    createMobileMenu();

    // Debounce resize event
    let resizeTimer;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(createMobileMenu, 250);
    });

    // ============================================
    // PREVENT EMPTY HREF CLICKS
    // ============================================
    document.querySelectorAll('a[href="#"]').forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
        });
    });

    // ============================================
    // FEATURE CARDS ANIMATION ON SCROLL
    // ============================================
    if ("IntersectionObserver" in window) {
        const cardObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = "1";
                        entry.target.style.transform = "translateY(0)";
                    }
                });
            },
            {
                threshold: 0.1,
                rootMargin: "0px 0px -50px 0px",
            }
        );

        document.querySelectorAll(".feature-card").forEach((card) => {
            card.style.opacity = "0";
            card.style.transform = "translateY(30px)";
            card.style.transition = "opacity 0.6s ease, transform 0.6s ease";
            cardObserver.observe(card);
        });
    }

    // ============================================
    // LOG SUCCESS
    // ============================================
    console.log("✅ Mehal International LLC - Website loaded successfully");
    console.log(
        "✅ Slider initialized with",
        announcements.length,
        "announcements"
    );
    console.log("✅ Search modal ready");
    console.log("✅ Mobile menu configured");
});
