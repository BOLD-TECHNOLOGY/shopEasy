<nav class="d_dashboard-nav">
    <div class="d_nav-container">
        <div class="d_nav-header">
            <div class="d_nav-title">
                <h1>{{ auth()->user()->name }}</h1>
                <div class="d_nav-subtitle">
                    <span class="d_role-indicator">{{ auth()->user()->role }}</span>
                    <span>Control Center</span>
                </div>
            </div>
            
            <div class="d_nav-controls">
                <div class="d_search-box">
                    <input type="text" class="d_search-input" placeholder="Search products, orders, customers...">
                </div>
                
                <div class="d_nav-actions">
                    <a href="#" class="d_nav-btn">Settings</a>
                    <a href="" class="d_nav-btn primary">
                        New Shop
                    </a>
                </div>
                
                <div class="d_notification-indicator">
                    <svg class="d_bell-icon" viewBox="0 0 24 24">
                        <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                    </svg>
                    <div class="d_notification-count">7</div>
                </div>
            </div>
        </div>
    </div>
</nav>