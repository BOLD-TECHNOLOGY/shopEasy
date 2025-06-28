
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