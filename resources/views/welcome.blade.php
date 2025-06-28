<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>shopEasy</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/original.css') }}">
        
    </head>
    <body class="">

        <header class="navigation-bar">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <div class="brand-icon">
                            <i class="bi bi-bag-fill"></i>
                        </div>
                        shopEasy
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#categories">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#view-all">View All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contacts">Contact</a>
                            </li>
                        </ul>

                        <div class="d-flex flex-column flex-lg-row align-items-center gap-3">
                            <div class="search-container">
                                <input type="text" class="search-input" placeholder="Search products...">
                                <i class="bi bi-search search-icon"></i>
                            </div>
                            
                            <div class="auth-buttons">
                                <a href="#" class="btn-outline-dark">Login</a>
                                <a href="#" class="btn-dark">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <section class="hero-section">
            <div class="hero-slide active">
                <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Fashion Collection" class="hero-background">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <h1 class="hero-title">Fashion Forward Collection</h1>
                    <p class="hero-subtitle">Discover the latest trends in fashion with our curated collection of premium clothing, accessories, and lifestyle products that define your unique style.</p>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">50K+</span>
                            <span class="stat-label">Products</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">1M+</span>
                            <span class="stat-label">Happy Customers</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">24/7</span>
                            <span class="stat-label">Support</span>
                        </div>
                    </div>
                    <div class="hero-buttons">
                        <a href="#" class="hero-btn-primary">Shop Fashion →</a>
                        <a href="#" class="hero-btn-secondary">View Lookbook</a>
                    </div>
                </div>
            </div>

            <div class="hero-slide">
                <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2126&q=80" alt="Tech Innovation" class="hero-background">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <h1 class="hero-title">Tech Innovation Hub</h1>
                    <p class="hero-subtitle">Explore cutting-edge electronics and smart devices that enhance your digital lifestyle. From smartphones to smart home solutions.</p>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Brands</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">99.9%</span>
                            <span class="stat-label">Uptime</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">2 Years</span>
                            <span class="stat-label">Warranty</span>
                        </div>
                    </div>
                    <div class="hero-buttons">
                        <a href="#" class="hero-btn-primary">Shop Tech →</a>
                        <a href="#" class="hero-btn-secondary">Compare Products</a>
                    </div>
                </div>
            </div>

            <div class="hero-slide">
                <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Athletic Excellence" class="hero-background">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <h1 class="hero-title">Athletic Excellence</h1>
                    <p class="hero-subtitle">Gear up for success with premium sports equipment, athletic wear, and fitness accessories designed for peak performance.</p>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">100+</span>
                            <span class="stat-label">Sports Categories</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">5 Star</span>
                            <span class="stat-label">Rating</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">Free</span>
                            <span class="stat-label">Shipping</span>
                        </div>
                    </div>
                    <div class="hero-buttons">
                        <a href="#" class="hero-btn-primary">Shop Sports →</a>
                        <a href="#" class="hero-btn-secondary">Fitness Guide</a>
                    </div>
                </div>
            </div>

            <div class="hero-slide">
                <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2116&q=80" alt="Beautiful Living Spaces" class="hero-background">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <h1 class="hero-title">Beautiful Living Spaces</h1>
                    <p class="hero-subtitle">Transform your home into a sanctuary with our carefully selected furniture, decor, and home essentials that blend comfort with style.</p>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">10K+</span>
                            <span class="stat-label">Home Items</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">30 Days</span>
                            <span class="stat-label">Return Policy</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">Expert</span>
                            <span class="stat-label">Design Tips</span>
                        </div>
                    </div>
                    <div class="hero-buttons">
                        <a href="#" class="hero-btn-primary">Shop Home →</a>
                        <a href="#" class="hero-btn-secondary">Design Ideas</a>
                    </div>
                </div>
            </div>

            <div class="hero-navigation">
                <div class="hero-dot active" data-slide="0"></div>
                <div class="hero-dot" data-slide="1"></div>
                <div class="hero-dot" data-slide="2"></div>
                <div class="hero-dot" data-slide="3"></div>
            </div>

            <div class="hero-progress"></div>
        </section>

        <section class="products-section" id="categories">
            <div class="products-header">
                <h2 class="products-title">Featured Products</h2>
                <p class="products-subtitle">Discover our curated selection of premium products across all categories, handpicked for quality and style.</p>
            </div>

            <div class="products-categories">
                <a href="#" class="products-category-btn products-active">All</a>
                <a href="#" class="products-category-btn">Tech</a>
                <a href="#" class="products-category-btn">Fashion</a>
                <a href="#" class="products-category-btn">Home</a>
                <a href="#" class="products-category-btn">Sports</a>
                <a href="#" class="products-category-btn">Beauty</a>
            </div>

            <div class="products-grid">
                <!-- Tech Product -->
                <div class="products-card">
                    <div class="products-card-image">
                        <div style="background: #f0f0f0; height: 100%; display: flex; align-items: center; justify-content: center; color: #666;">
                            <img src="{{ asset('assets/images/erik-mclean-nfoRa6NHTbU-unsplash.jpg') }}" alt="Tech image">
                        </div>
                        <div class="products-card-badge">New</div>
                    </div>
                    <div class="products-card-content">
                        <div class="products-card-category">Technology</div>
                        <h3 class="products-card-title">Wireless Bluetooth Headphones</h3>
                        <div class="products-card-price">
                            <span class="products-current-price">$199</span>
                            <span class="products-original-price">$249</span>
                        </div>
                        <div class="products-card-actions">
                            <a href="#" class="products-btn products-btn-primary">Add to Cart</a>
                            <a href="#" class="products-btn products-btn-secondary">♡</a>
                        </div>
                    </div>
                </div>

                <!-- Fashion Product -->
                <div class="products-card">
                    <div class="products-card-image">
                        <div style="background: #f8f8f8; height: 100%; display: flex; align-items: center; justify-content: center; color: #666;">
                            <img src="{{ asset('assets/images/freestocks-VFrcRtEQKL8-unsplash.jpg') }}" alt="Fashion image">
                        </div>
                        <div class="products-card-badge">Sale</div>
                    </div>
                    <div class="products-card-content">
                        <div class="products-card-category">Fashion</div>
                        <h3 class="products-card-title">Premium Cotton T-Shirt</h3>
                        <div class="products-card-price">
                            <span class="products-current-price">$29</span>
                            <span class="products-original-price">$45</span>
                        </div>
                        <div class="products-card-actions">
                            <a href="#" class="products-btn products-btn-primary">Add to Cart</a>
                            <a href="#" class="products-btn products-btn-secondary">♡</a>
                        </div>
                    </div>
                </div>

                <!-- Home Product -->
                <div class="products-card">
                    <div class="products-card-image">
                        <div style="background: #f5f5f5; height: 100%; display: flex; align-items: center; justify-content: center; color: #666;">
                            <img src="{{ asset('assets/images/freestocks-yqBKaF1KecM-unsplash.jpg') }}" alt="Home image">
                        </div>
                    </div>
                    <div class="products-card-content">
                        <div class="products-card-category">Home & Living</div>
                        <h3 class="products-card-title">Modern Table Lamp</h3>
                        <div class="products-card-price">
                            <span class="products-current-price">$89</span>
                        </div>
                        <div class="products-card-actions">
                            <a href="#" class="products-btn products-btn-primary">Add to Cart</a>
                            <a href="#" class="products-btn products-btn-secondary">♡</a>
                        </div>
                    </div>
                </div>

                <!-- Sports Product -->
                <div class="products-card">
                    <div class="products-card-image">
                        <div style="background: #f2f2f2; height: 100%; display: flex; align-items: center; justify-content: center; color: #666;">
                            <img src="{{ asset('assets/images/lucrezia-carnelos-wQ9VuP_Njr4-unsplash.jpg') }}" alt="Sports image">
                        </div>
                        <div class="products-card-badge">Hot</div>
                    </div>
                    <div class="products-card-content">
                        <div class="products-card-category">Sports</div>
                        <h3 class="products-card-title">Professional Running Shoes</h3>
                        <div class="products-card-price">
                            <span class="products-current-price">$129</span>
                            <span class="products-original-price">$160</span>
                        </div>
                        <div class="products-card-actions">
                            <a href="#" class="products-btn products-btn-primary">Add to Cart</a>
                            <a href="#" class="products-btn products-btn-secondary">♡</a>
                        </div>
                    </div>
                </div>

                <!-- Beauty Product -->
                <div class="products-card">
                    <div class="products-card-image">
                        <div style="background: #fafafa; height: 100%; display: flex; align-items: center; justify-content: center; color: #666;">
                            <img src="{{ asset('assets/images/lucrezia-carnelos-wQ9VuP_Njr4-unsplash.jpg') }}" alt="Beauty image">
                        </div>
                    </div>
                    <div class="products-card-content">
                        <div class="products-card-category">Beauty</div>
                        <h3 class="products-card-title">Organic Skincare Set</h3>
                        <div class="products-card-price">
                            <span class="products-current-price">$75</span>
                        </div>
                        <div class="products-card-actions">
                            <a href="#" class="products-btn products-btn-primary">Add to Cart</a>
                            <a href="#" class="products-btn products-btn-secondary">♡</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="products-view-all">
                <a href="#" class="products-view-all-btn">
                    View All Products
                    <span>→</span>
                </a>
            </div>
        </section>

        <section class="contact-section" id="contacts">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5">
                        <h2 class="section-title">Get In Touch</h2>
                        <p class="section-subtitle">Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                    </div>
                </div>
                
                <div class="row g-5">
                    <div class="col-lg-8">
                        <div class="contact-form-container">
                            <form class="contact-form">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName">First Name</label>
                                            <input type="text" id="firstName" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" id="lastName" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" id="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <select id="subject" class="form-control">
                                                <option value="">Select a subject</option>
                                                <option value="general">General Inquiry</option>
                                                <option value="support">Customer Support</option>
                                                <option value="returns">Returns & Refunds</option>
                                                <option value="wholesale">Wholesale Inquiry</option>
                                                <option value="partnership">Partnership</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea id="message" class="form-control" rows="6" placeholder="Tell us how we can help you..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn-submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </div>
                                <h4>Visit Our Store</h4>
                                <p>123 Shopping Street<br>
                                Fashion District, NY 10001<br>
                                United States</p>
                            </div>
                            
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>
                                <h4>Call Us</h4>
                                <p>+1 (555) 123-4567<br>
                                Mon - Fri: 9:00 AM - 6:00 PM<br>
                                Sat - Sun: 10:00 AM - 4:00 PM</p>
                            </div>
                            
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="bi bi-envelope-fill"></i>
                                </div>
                                <h4>Email Us</h4>
                                <p>info@shopeasy.com<br>
                                support@shopeasy.com<br>
                                We'll respond within 24 hours</p>
                            </div>
                            
                            <div class="contact-card">
                                <div class="contact-icon">
                                    <i class="bi bi-chat-dots-fill"></i>
                                </div>
                                <h4>Live Chat</h4>
                                <p>Available 24/7 for instant support<br>
                                <a href="#" class="chat-link">Start Live Chat →</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="container">
                <div class="footer-content">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-brand">
                                <div class="footer-logo">
                                    <div class="brand-icon">
                                        <i class="bi bi-bag-fill"></i>
                                    </div>
                                    <h3>shopEasy</h3>
                                </div>
                                <p class="footer-description">
                                    Your trusted online shopping destination for fashion, tech, sports, and home essentials. 
                                    Quality products, exceptional service, and unbeatable prices.
                                </p>
                                <div class="social-links">
                                    <a href="#" class="social-link">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="#" class="social-link">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                    <a href="#" class="social-link">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                    <a href="#" class="social-link">
                                        <i class="bi bi-youtube"></i>
                                    </a>
                                    <a href="#" class="social-link">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-2 col-md-6">
                            <div class="footer-links">
                                <h5>Shop</h5>
                                <ul>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Electronics</a></li>
                                    <li><a href="#">Sports</a></li>
                                    <li><a href="#">Home & Garden</a></li>
                                    <li><a href="#">Beauty</a></li>
                                    <li><a href="#">Books</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-lg-2 col-md-6">
                            <div class="footer-links">
                                <h5>Customer Service</h5>
                                <ul>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Shipping Info</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Size Guide</a></li>
                                    <li><a href="#">Track Order</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-lg-2 col-md-6">
                            <div class="footer-links">
                                <h5>Company</h5>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">Press</a></li>
                                    <li><a href="#">Affiliates</a></li>
                                    <li><a href="#">Wholesale</a></li>
                                    <li><a href="#">Sustainability</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-lg-2 col-md-6">
                            <div class="footer-links">
                                <h5>Connect</h5>
                                <ul>
                                    <li><a href="#">Newsletter</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Events</a></li>
                                    <li><a href="#">Community</a></li>
                                    <li><a href="#">Mobile App</a></li>
                                    <li><a href="#">Gift Cards</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="newsletter-section">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4>Stay Updated</h4>
                                <p>Subscribe to our newsletter for the latest deals and trends</p>
                            </div>
                            <div class="col-md-6">
                                <div class="newsletter-form">
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="Enter your email">
                                        <button class="btn-newsletter" type="button">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="footer-bottom">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <p class="copyright">© 2025 shopEasy. All rights reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-legal">
                                <a href="#">Privacy Policy</a>
                                <a href="#">Terms of Service</a>
                                <a href="#">Cookie Policy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif

        <script src="{{ asset('assets/js/script.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
