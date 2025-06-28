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