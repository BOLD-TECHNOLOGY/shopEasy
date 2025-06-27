<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>shopEasy</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
        
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/original.css') }}">
        
    </head>
    <body class="">
        <header class="navigation-bar">
            <!-- Desktop Navigation -->
            <div class="desktop-nav">
                <div class="top-nav">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-3 logo-container">
                                <div class="logo-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <div class="logo-text">
                                    <h3>shopEasy</h3>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="center-menu">
                                    <a href="#" class="nav-link">Categories</a>
                                    <a href="#" class="nav-link">View all</a>
                                    <a href="#" class="nav-link">Contact</a>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="search-login-container">
                                    <div class="search-container">
                                        <input type="text" class="form-control" placeholder="Search products...">
                                        <i class="fas fa-search search-icon"></i>
                                    </div>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Login</a>
                                    <a href="#" class="btn btn-primary btn-sm">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div class="mobile-nav-toggles">
                <div class="mobile-logo">
                    <div class="logo-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>shopEasy</h3>
                </div>
                
                <button class="btn btn-sm btn-outline-secondary" id="menuBtn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <div class="top-mobile-menu" id="mobileTopNav">
                <div class="mobile-menu-links mb-4">
                    <a href="#" class="nav-link d-block">Categories</a>
                    <a href="#" class="nav-link d-block">View all</a>
                    <a href="#" class="nav-link d-block">Contact</a>
                </div>
                
                <div class="search-login-container-mobile">
                    <div class="search-container-mobile mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search products...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-primary">Login</a>
                        <a href="#" class="btn btn-primary">Register</a>
                    </div>
                </div>
            </div>
        </header>

        <section class="hero-container">
            <div class="hero-slides">
                <div class="hero-slide active">
                    <div class="floating-elements">
                        <div class="floating-shape"></div>
                        <div class="floating-shape"></div>
                        <div class="floating-shape"></div>
                    </div>
                    <div class="hero-content">
                        <div class="content-wrapper">
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
                                <a href="#" class="btn-primary">Shop Fashion →</a>
                                <a href="#" class="btn-secondary">View Lookbook</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hero-slide">
                    <div class="floating-elements">
                        <div class="floating-shape"></div>
                        <div class="floating-shape"></div>
                        <div class="floating-shape"></div>
                    </div>
                    <div class="hero-content">
                        <div class="content-wrapper">
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
                                <a href="#" class="btn-primary">Shop Tech →</a>
                                <a href="#" class="btn-secondary">Compare Products</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hero-slide">
                    <div class="floating-elements">
                        <div class="floating-shape"></div>
                        <div class="floating-shape"></div>
                        <div class="floating-shape"></div>
                    </div>
                    <div class="hero-content">
                        <div class="content-wrapper">
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
                                <a href="#" class="btn-primary">Shop Sports →</a>
                                <a href="#" class="btn-secondary">Fitness Guide</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hero-slide">
                    <div class="floating-elements">
                        <div class="floating-shape"></div>
                        <div class="floating-shape"></div>
                        <div class="floating-shape"></div>
                    </div>
                    <div class="hero-content">
                        <div class="content-wrapper">
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
                                <a href="#" class="btn-primary">Shop Home →</a>
                                <a href="#" class="btn-secondary">Design Ideas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-dots">
                <div class="dot active" data-slide="0"></div>
                <div class="dot" data-slide="1"></div>
                <div class="dot" data-slide="2"></div>
                <div class="dot" data-slide="3"></div>
            </div>

            <div class="progress-bar"></div>
        </section>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif

        <!-- Bootstrap JS & Popper.js -->
        <script src="{{ asset('assets/js/script.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
