<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Mehal International LLC.</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <a href="#MainContent" class="skip-link">Skip to content</a>

    <!-- Top Banner -->
    <div class="top-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">Questions? Contact us at <a href="mailto:customerservice@mehalintl.com">customerservice@mehalintl.com</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Announcement Bar -->
    <div class="announcement-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">tapeandtoner.com - Coming Soon!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="/">Mehal International LLC.</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/sales-channels">Sales Channels</a></li>
                    <li class="nav-item"><a class="nav-link" href="/brands">Brands We Carry</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-search"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Log in</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main id="MainContent">
        <section class="contact-page py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <h1 class="page-heading">Contact Us</h1>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="contact-info-section mb-5">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <h3 class="contact-info-title">EMAIL</h3>
                                    <p class="contact-info-text"><a href="mailto:Customerservice@mehalintl.com">Customerservice@mehalintl.com</a></p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h3 class="contact-info-title">PHONE</h3>
                                    <p class="contact-info-text"><a href="tel:(469)767-7626">(469) 767-7626</a></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="contact-form-section">
                            <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control contact-input" id="name" name="name" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control contact-input" id="email" name="email" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control contact-input" id="phone" name="phone">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control contact-input" id="message" name="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn contact-submit-btn">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h4 class="footer-heading">GET IN TOUCH</h4>
                    <p class="footer-text"><strong>EMAIL:</strong> <a href="mailto:Customerservice@mehalintl.com">Customerservice@mehalintl.com</a></p>
                    <p class="footer-text"><strong>Phone:</strong> <a href="tel:(469)767-7626">(469) 767-7626</a></p>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h4 class="footer-heading">Payment methods</h4>
                    <ul class="payment-list">
                        <li><span>PayPal</span></li>
                        <li><span>Venmo</span></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <p class="footer-copyright">COPYRIGHT ©2023 Mehal International LLC., All Rights Reserved</p>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <p class="footer-bottom">© 2026, <a href="/">Mehal International LLC.</a></p>
                </div>
            </div>
        </div>
    </footer>

    <style>
        .contact-page {
            min-height: 50vh;
        }
        
        .page-heading {
            font-family: 'Assistant', sans-serif;
            font-size: 4rem;
            font-weight: 700;
            color: #000000;
            margin-bottom: 2rem;
        }
        
        .contact-info-title {
            font-family: 'Assistant', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: #000000;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
        }
        
        .contact-info-text {
            font-size: 1.6rem;
            line-height: 1.7;
            color: #000000;
        }
        
        .contact-info-text a {
            color: #000000;
            text-decoration: none;
            transition: opacity 0.2s ease;
        }
        
        .contact-info-text a:hover {
            opacity: 0.7;
        }
        
        .form-label {
            font-family: 'Assistant', sans-serif;
            font-size: 1.4rem;
            font-weight: 600;
            color: #000000;
            margin-bottom: 0.5rem;
        }
        
        .contact-input {
            font-family: 'Assistant', sans-serif;
            font-size: 1.4rem;
            padding: 1.2rem 1.6rem;
            border: 1px solid rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            color: #000000;
            transition: border-color 0.2s ease;
        }
        
        .contact-input:focus {
            border-color: #000000;
            box-shadow: none;
            outline: none;
        }
        
        .contact-submit-btn {
            font-family: 'Assistant', sans-serif;
            font-size: 1.6rem;
            font-weight: 600;
            padding: 1.2rem 3rem;
            background-color: #000000;
            color: #ffffff;
            border: none;
            transition: opacity 0.2s ease;
            width: 100%;
        }
        
        .contact-submit-btn:hover {
            opacity: 0.8;
            background-color: #000000;
        }
        
        @media (max-width: 767px) {
            .page-heading {
                font-size: 2.8rem;
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
