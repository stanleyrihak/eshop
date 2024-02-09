<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',

        'resources/css/bootstrap.min.css',
        'resources/css/tiny-slider.css',
         'resources/css/style.css',
         'resources/js/bootstrap.bundle.min.js',
         'resources/js/tiny-slider.js',
         'resources/js/custom.js'
    ])

</head>
<body class="font-sans antialiased">

<div class="min-h-screen bg-gray-100">
    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="{{ route('homepage') }}">Furni<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                    aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" navbar-collapse" id="navbarsFurni"> {{--collapse--}}
                <ul id="links-container" class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="{{ request()->route()->getName() == 'homepage' ? 'active' : '' }}"><a class="nav-link"
                                                                                           href="{{route('homepage')}}">Home</a>
                    </li>
                    <li class="{{ request()->route()->getName() == 'shop' ? 'active' : '' }}"><a class="nav-link"
                                                                                       href="{{route('shop')}}">Shop</a>
                    </li>
                    <li class="{{ request()->route()->getName() == 'about' ? 'active' : '' }}"><a class="nav-link"
                                                                                        href="{{route('about')}}">About
                            us</a></li>
                    {{--<li class="{{ $current_route_name == 'homepage' ? 'active' : '' }}"><a class="nav-link" href="{{route('homepage')}}">Services</a></li>
                    <li class="{{ $current_route_name == 'homepage' ? 'active' : '' }}"><a class="nav-link" href="{{route('homepage')}}">Blog</a></li>
                    <li class="{{ $current_route_name == 'homepage' ? 'active' : '' }}"><a class="nav-link" href="{{route('homepage')}}">Contact us</a></li>--}}
                </ul>


                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5 user_flex">
                    @auth()
                        <li class="navbar_user_container">
                            <img src="{{asset('storage/images/ux/user.svg')}}">
                            <span>{{auth()->user()->name}}</span>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('login.logout') }}">
                                @csrf
                                <button class="user_logout" type="submit">Log out</button>
                            </form>
                        </li>
                    @endauth
                    @guest()
                        <li>
                            <a href="{{ route('login.create') }}">login</a>
                        </li>
                        <li>
                            <a href="{{ route('register.create') }}">register</a>
                        </li>
                    @endguest
                    <li>
                        <a class="nav-link dynamic-cart-wrapper" href="{{ route('cart.index') }}">
                            <img src="{{asset('storage/images/ux/cart.svg')}}">
                            <span class="dynamic-cart">{{ app(\App\Services\CartService::class)->getCount() }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <!-- End Header/Navigation -->

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">

            <div class="sofa-img">
                <img src="{{asset('storage/images/ux/sofa.png')}}" alt="Image" class="img-fluid">
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="subscription-form">
                        <h3 class="d-flex align-items-center"><span class="me-1"><img
                                    src="{{asset('storage/images/ux/envelope-outline.svg')}}" alt="Image"
                                    class="img-fluid"></span><span>Subscribe to Newsletter</span>
                        </h3>

                        <form action="#" class="row g-3">
                            <div class="col-auto">
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="col-auto">
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary">
                                    <span class="fa fa-paper-plane"></span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="{{ route('homepage') }}" class="footer-logo">Furni<span>.</span></a>
                    </div>
                    <p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus
                        malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.
                        Pellentesque habitant</p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="{{ route('homepage') }}"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="{{ route('homepage') }}"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="{{ route('homepage') }}"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="{{ route('homepage') }}"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="row links-wrap">
                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('homepage') }}">About us</a></li>
                                <li><a href="{{ route('homepage') }}">Services</a></li>
                                <li><a href="{{ route('homepage') }}">Blog</a></li>
                                <li><a href="{{ route('homepage') }}">Contact us</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('homepage') }}">Support</a></li>
                                <li><a href="{{ route('homepage') }}">Knowledge base</a></li>
                                <li><a href="{{ route('homepage') }}">Live chat</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('homepage') }}">Jobs</a></li>
                                <li><a href="{{ route('homepage') }}">Our team</a></li>
                                <li><a href="{{ route('homepage') }}">Leadership</a></li>
                                <li><a href="{{ route('homepage') }}">Privacy Policy</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('homepage') }}">Nordic Chair</a></li>
                                <li><a href="{{ route('homepage') }}">Kruzo Aero</a></li>
                                <li><a href="{{ route('homepage') }}">Ergonomic Chair</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            . All Rights Reserved. &mdash; Designed with love by <a
                                href="https://untree.co">Untree.co</a>
                            Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>
                            <!-- License information: https://untree.co/license/ -->
                        </p>
                    </div>

                    <div class="col-lg-6 text-center text-lg-end">
                        <ul class="list-unstyled d-inline-flex ms-auto">
                            <li class="me-4"><a href="{{ route('homepage') }}">Terms &amp; Conditions</a></li>
                            <li><a href="{{ route('homepage') }}">Privacy Policy</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </footer>
    <!-- End Footer Section -->
</div>
</body>
</html>
