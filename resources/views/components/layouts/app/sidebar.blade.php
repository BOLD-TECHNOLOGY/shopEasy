<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <div class="_sidebar mobile-header">
            <button class="_sidebar mobile-toggle" id="mobileToggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="_sidebar mobile-profile">
                <button class="_sidebar mobile-profile-btn" id="mobileProfileBtn">
                    <div class="_sidebar mobile-profile-avatar"><h4>{{ auth()->user()->initials }}</h4></div>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="_sidebar mobile-profile-dropdown" id="mobileProfileDropdown">
                    <div class="_sidebar dropdown-item">
                        <div class="_sidebar mobile-profile-avatar"><h4>{{ auth()->user()->initials }}</h4></div>
                        <div>
                            <div class="_sidebar profile-name"><h4>{{ auth()->user()->name }}</h4></div>
                            <div class="_sidebar profile-email"><p>{{ auth()->user()->email }}</p></div>
                        </div>
                    </div>
                    <div class="_sidebar dropdown-divider"></div>
                    <a href="#" class="_sidebar dropdown-item">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                    <div class="_sidebar dropdown-divider"></div>
                    <button class="_sidebar dropdown-item" onclick="logout()">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Log Out</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Overlay -->
        <div class="_sidebar mobile-overlay" id="mobileOverlay"></div>

        <!-- Sidebar -->
        <nav class="_sidebar sidebar" id="sidebar">
            <div class="_sidebar sidebar-header">
                <a href="#" class="_sidebar logo">
                    <i class="fas fa-cube"></i>
                    <span class="_sidebar logo-text">shopEasy</span>
                </a>
                <button class="_sidebar sidebar-toggle d-none d-lg-block" id="sidebarToggle">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>

            <!-- Admin Role Switcher - Only visible to Admins -->
            @if (auth()->user()->role === App\Enums\Roles::Admin)
            <div class="_sidebar role-switcher-section">
                <div class="_sidebar role-switcher-title">
                    <i class="fas fa-eye"></i>
                    <span>View As</span>
                </div>
                <div class="_sidebar role-switcher-dropdown">
                    <button class="_sidebar role-switcher-btn" id="roleSwitcherBtn">
                        <i class="fas fa-user-shield" id="currentRoleIcon"></i>
                        <span id="currentRoleText">Admin</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="_sidebar role-switcher-menu" id="roleSwitcherMenu">
                        <div class="_sidebar role-option active" data-role="admin">
                            <i class="fas fa-user-shield"></i>
                            <span>Admin View</span>
                        </div>
                        <div class="_sidebar role-option" data-role="user">
                            <i class="fas fa-user"></i>
                            <span>User View</span>
                        </div>
                        <div class="_sidebar role-option" data-role="blogger">
                            <i class="fas fa-pen"></i>
                            <span>Blogger View</span>
                        </div>
                        <div class="_sidebar role-option" data-role="vendor">
                            <i class="fas fa-store"></i>
                            <span>Vendor View</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="_sidebar nav-section">
                <div class="_sidebar nav-section-title">Platform</div>
                <ul class="_sidebar nav-list">
                    <li class="_sidebar nav-item">
                        <a href="#" class="_sidebar nav-link active" data-tooltip="Dashboard">
                            <i class="fas fa-home"></i>
                            <span class="_sidebar nav-text">Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Admin Navigation - Admin Only with Role Switcher -->
            @if (auth()->user()->role === App\Enums\Roles::Admin)
                <div class="_sidebar nav-section admin-section" id="adminNav">
                    <div class="_sidebar nav-section-title">Admin Controls</div>
                    <ul class="_sidebar nav-list">
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Products">
                                <i class="fas fa-box"></i>
                                <span class="_sidebar nav-text">Products</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Subscribers">
                                <i class="fas fa-users"></i>
                                <span class="_sidebar nav-text">Subscribers</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Users">
                                <i class="fas fa-user-friends"></i>
                                <span class="_sidebar nav-text">Users</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Posts">
                                <i class="fas fa-file-alt"></i>
                                <span class="_sidebar nav-text">Posts</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Analytics">
                                <i class="fas fa-chart-line"></i>
                                <span class="_sidebar nav-text">Analytics</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Settings">
                                <i class="fas fa-cogs"></i>
                                <span class="_sidebar nav-text">System Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- User Navigation - Admin can view this -->
                <div class="_sidebar nav-section user-section" id="userNav" style="display: none;">
                    <div class="_sidebar nav-section-title">User Dashboard</div>
                    <ul class="_sidebar nav-list">
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Profile">
                                <i class="fas fa-user"></i>
                                <span class="_sidebar nav-text">Profile</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Orders">
                                <i class="fas fa-shopping-bag"></i>
                                <span class="_sidebar nav-text">My Orders</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Wishlist">
                                <i class="fas fa-heart"></i>
                                <span class="_sidebar nav-text">Wishlist</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Account">
                                <i class="fas fa-cog"></i>
                                <span class="_sidebar nav-text">Account Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Blogger Navigation - Admin can view this -->
                <div class="_sidebar nav-section blogger-section" id="bloggerNav" style="display: none;">
                    <div class="_sidebar nav-section-title">Content Management</div>
                    <ul class="_sidebar nav-list">
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Profile">
                                <i class="fas fa-user"></i>
                                <span class="_sidebar nav-text">Profile</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="My Posts">
                                <i class="fas fa-file-alt"></i>
                                <span class="_sidebar nav-text">My Posts</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Create Post">
                                <i class="fas fa-plus"></i>
                                <span class="_sidebar nav-text">Create Post</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Analytics">
                                <i class="fas fa-chart-bar"></i>
                                <span class="_sidebar nav-text">Post Analytics</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Account">
                                <i class="fas fa-cog"></i>
                                <span class="_sidebar nav-text">Account Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Vendor Navigation - Admin can view this -->
                <div class="_sidebar nav-section vendor-section" id="vendorNav" style="display: none;">
                    <div class="_sidebar nav-section-title">Vendor Dashboard</div>
                    <ul class="_sidebar nav-list">
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Profile">
                                <i class="fas fa-user"></i>
                                <span class="_sidebar nav-text">Profile</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="My Products">
                                <i class="fas fa-box"></i>
                                <span class="_sidebar nav-text">My Products</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Add Product">
                                <i class="fas fa-plus"></i>
                                <span class="_sidebar nav-text">Add Product</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Orders">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="_sidebar nav-text">Orders</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Inventory">
                                <i class="fas fa-warehouse"></i>
                                <span class="_sidebar nav-text">Inventory</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Sales">
                                <i class="fas fa-chart-line"></i>
                                <span class="_sidebar nav-text">Sales Analytics</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Account">
                                <i class="fas fa-cog"></i>
                                <span class="_sidebar nav-text">Account Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            @endif

            <!-- Regular User Navigation - User Only -->
            @if (auth()->user()->role === App\Enums\Roles::User)
                <div class="_sidebar nav-section user-section">
                    <div class="_sidebar nav-section-title">User Dashboard</div>
                    <ul class="_sidebar nav-list">
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Profile">
                                <i class="fas fa-user"></i>
                                <span class="_sidebar nav-text">Profile</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Orders">
                                <i class="fas fa-shopping-bag"></i>
                                <span class="_sidebar nav-text">My Orders</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Wishlist">
                                <i class="fas fa-heart"></i>
                                <span class="_sidebar nav-text">Wishlist</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Account">
                                <i class="fas fa-cog"></i>
                                <span class="_sidebar nav-text">Account Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            @endif

            <!-- Blogger Navigation - Blogger Only -->
            @if (auth()->user()->role === App\Enums\Roles::Blogger)
                <div class="_sidebar nav-section blogger-section">
                    <div class="_sidebar nav-section-title">Content Management</div>
                    <ul class="_sidebar nav-list">
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Profile">
                                <i class="fas fa-user"></i>
                                <span class="_sidebar nav-text">Profile</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="My Posts">
                                <i class="fas fa-file-alt"></i>
                                <span class="_sidebar nav-text">My Posts</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Create Post">
                                <i class="fas fa-plus"></i>
                                <span class="_sidebar nav-text">Create Post</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Analytics">
                                <i class="fas fa-chart-bar"></i>
                                <span class="_sidebar nav-text">Post Analytics</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Account">
                                <i class="fas fa-cog"></i>
                                <span class="_sidebar nav-text">Account Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            @endif

            <!-- Vendor Navigation - Vendor Only -->
            @if (auth()->user()->role === App\Enums\Roles::Vendor)
                <div class="_sidebar nav-section vendor-section">
                    <div class="_sidebar nav-section-title">Vendor Dashboard</div>
                    <ul class="_sidebar nav-list">
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Profile">
                                <i class="fas fa-user"></i>
                                <span class="_sidebar nav-text">Profile</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="My Products">
                                <i class="fas fa-box"></i>
                                <span class="_sidebar nav-text">My Products</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Add Product">
                                <i class="fas fa-plus"></i>
                                <span class="_sidebar nav-text">Add Product</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Orders">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="_sidebar nav-text">Orders</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Inventory">
                                <i class="fas fa-warehouse"></i>
                                <span class="_sidebar nav-text">Inventory</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Sales">
                                <i class="fas fa-chart-line"></i>
                                <span class="_sidebar nav-text">Sales Analytics</span>
                            </a>
                        </li>
                        <li class="_sidebar nav-item">
                            <a href="#" class="_sidebar nav-link" data-tooltip="Account">
                                <i class="fas fa-cog"></i>
                                <span class="_sidebar nav-text">Account Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            @endif

            <div class="_sidebar sidebar-footer">
                <div class="_sidebar external-links">
                    <a href="https://github.com/laravel/livewire-starter-kit" target="_blank" class="_sidebar external-link">
                        <i class="fab fa-github"></i>
                        <span>Repository</span>
                    </a>
                    <a href="https://laravel.com/docs/starter-kits#livewire" target="_blank" class="_sidebar external-link">
                        <i class="fas fa-book-open"></i>
                        <span>Documentation</span>
                    </a>
                </div>

                <div class="_sidebar user-profile d-none d-lg-block">
                    <button class="_sidebar profile-btn" id="profileBtn">
                        <div class="_sidebar profile-avatar"><h4>{{ auth()->user()->initials }}</h4></div>
                        <div class="_sidebar profile-info">
                            <div class="_sidebar profile-name"><h4>{{ auth()->user()->name }}</h4></div>
                            <div class="_sidebar profile-email"><p>{{ auth()->user()->email }}</p></div>
                        </div>
                        <i class="fas fa-chevron-up"></i>
                    </button>
                    <div class="_sidebar profile-dropdown" id="profileDropdown">
                        <div class="_sidebar dropdown-item">
                            <div class="_sidebar profile-avatar"><h4>{{ auth()->user()->initials }}</h4></div>
                            <div class="_sidebar profile-info">
                                <div class="_sidebar profile-name"><h4>{{ auth()->user()->name }}</h4></div>
                                <div class="_sidebar profile-email"><p>{{ auth()->user()->email }}</p></div>
                            </div>
                        </div>
                        <div class="_sidebar dropdown-divider"></div>
                        <a href="#" class="_sidebar dropdown-item">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                        <div class="_sidebar dropdown-divider"></div>
                        <button class="_sidebar dropdown-item" onclick="logout()">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Log Out</span>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <main class="main-content" id="mainContent">

            {{ $slot }}
            
        </main>

        @fluxScripts

        <script src="{{ asset('assets/js/dashboard.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    </body>
</html>