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

            @if (auth()->user()->role === App\Enums\Roles::Admin)

            <div class="_sidebar nav-section admin-section">
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
                </ul>
            </div>

            @endif

            @if (auth()->user()->role === App\Enums\Roles::User)

            <div class="_sidebar nav-section user-section" style="display: none;">
                <ul class="_sidebar nav-list">
                    <li class="_sidebar nav-item">
                        <a href="#" class="_sidebar nav-link" data-tooltip="Profile">
                            <i class="fas fa-user"></i>
                            <span class="_sidebar nav-text">Profile</span>
                        </a>
                    </li>
                    <li class="_sidebar nav-item">
                        <a href="#" class="_sidebar nav-link" data-tooltip="Account">
                            <i class="fas fa-cog"></i>
                            <span class="_sidebar nav-text">Account</span>
                        </a>
                    </li>
                </ul>
            </div>

            @endif

            @if (auth()->user()->role === App\Enums\Roles::Blogger)

            <div class="_sidebar nav-section blogger-section" style="display: none;">
                <ul class="_sidebar nav-list">
                    <li class="_sidebar nav-item">
                        <a href="#" class="_sidebar nav-link" data-tooltip="Profile">
                            <i class="fas fa-user"></i>
                            <span class="_sidebar nav-text">Profile</span>
                        </a>
                    </li>
                    <li class="_sidebar nav-item">
                        <a href="#" class="_sidebar nav-link" data-tooltip="Account">
                            <i class="fas fa-cog"></i>
                            <span class="_sidebar nav-text">Account</span>
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
