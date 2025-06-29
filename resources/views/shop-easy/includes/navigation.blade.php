<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="">

        <header class="navigation-bar">
            @if (Route::has('login'))

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
                                @auth
                                    <a href="{{ auth()->user()->getDashboardRoute() }}" class="btn-outline-dark">Dashboard</a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn-dark">Logout</button>
                                    </form>

                                    @else

                                    <a href="{{ route('login') }}" class="btn-outline-dark">Login</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn-dark">Register</a>
                                    @endif
                                
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            @endif
        </header>