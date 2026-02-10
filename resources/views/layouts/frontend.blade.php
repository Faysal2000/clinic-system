{{-- @extends('layouts.app')

@section('content')
    @include('frontend.navbar')

    <main>
        @yield('frontend-content')
    </main>

    @include('frontend.footer')
@endsection --}}

















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets/frontend/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/frontend/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/frontend/css/main.css') }}" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header fixed-top">


        <div class="branding d-flex align-items-cente">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="frontend/assets/img/logo.webp" alt=""> -->
                    <h1 href="/index" class="sitename">Clinic</h1>
                </a>
             
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="{{ route('frontend.index') }}" class="active">Home</a></li>
                        <li><a href="{{ route('frontend.about') }}">About</a></li>
                        <li><a href="{{ route('frontend.services') }}">Services</a></li>
                        <li><a href="{{ route('frontend.doctors') }}">Doctors</a></li>
                        <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                        @auth
                            <li>
                            <a href="{{ route('frontend.appointment') }}">
                                Book Appointment
                            </a>
                        </li>
                        @endauth
                        
                        @auth

                            <li>
                                <a href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button style="background:none;border:none;">Logout</button>
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login / Register</a></li>

                        @endauth

                        <li><a href="{{ route('login') }}">Login as Doctor</a></li>
                    </ul>
                </nav>

            </div>

        </div>

    </header>





    @yield('content')















    <footer id="footer" class="footer-16 footer position-relative">

        <div class="container">

            <div class="footer-main" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-start">

                    <div class="col-lg-5">
                        <div class="brand-section">
                            <a href="index.html" class="logo d-flex align-items-center mb-4">
                                <span class="sitename">Clinic</span>
                            </a>
                            <p class="brand-description">Crafting exceptional digital experiences through thoughtful
                                design and
                                innovative solutions that elevate your brand presence.</p>

                            <div class="contact-info mt-5">
                                <div class="contact-item">
                                    <i class="bi bi-geo-alt"></i>
                                    <span>123 Creative Boulevard, Design District, NY 10012</span>
                                </div>
                                <div class="contact-item">
                                    <i class="bi bi-telephone"></i>
                                    <span>+1 (555) 987-6543</span>
                                </div>
                                <div class="contact-item">
                                    <i class="bi bi-envelope"></i>
                                    <span>hello@designstudio.com</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="footer-nav-wrapper">
                            <div class="row">

                                <div class="col-6 col-lg-3">
                                    <div class="nav-column">
                                        <h6>Studio</h6>
                                        <nav class="footer-nav">
                                            <a href="#!">Our Story</a>
                                            <a href="#!">Design Process</a>
                                            <a href="#!">Portfolio</a>
                                            <a href="#!">Case Studies</a>
                                            <a href="#!">Awards</a>
                                        </nav>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <div class="nav-column">
                                        <h6>Services</h6>
                                        <nav class="footer-nav">
                                            <a href="#!">Brand Identity</a>
                                            <a href="#!">Web Design</a>
                                            <a href="#!">Mobile Apps</a>
                                            <a href="#!">Digital Strategy</a>
                                            <a href="#!">Consultation</a>
                                        </nav>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <div class="nav-column">
                                        <h6>Resources</h6>
                                        <nav class="footer-nav">
                                            <a href="#!">Design Blog</a>
                                            <a href="#!">Style Guide</a>
                                            <a href="#!">Free Assets</a>
                                            <a href="#!">Tutorials</a>
                                            <a href="#!">Inspiration</a>
                                        </nav>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <div class="nav-column">
                                        <h6>Connect</h6>
                                        <nav class="footer-nav">
                                            <a href="#!">Start Project</a>
                                            <a href="#!">Schedule Call</a>
                                            <a href="#!">Join Newsletter</a>
                                            <a href="#!">Follow Updates</a>
                                            <a href="#!">Partnership</a>
                                        </nav>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="bottom-content" data-aos="fade-up" data-aos-delay="300">
                    <div class="row align-items-center">

                        <div class="col-lg-6">
                            <div class="copyright">
                                <p>© <span class="sitename">Clinic</span>. All rights reserved.</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="legal-links">
                                <a href="#!">Privacy Policy</a>
                                <a href="#!">Terms of Service</a>
                                <a href="#!">Cookie Policy</a>
                                <div class="credits">
                                    <!-- All the links in the footer should remain intact. -->
                                    <!-- You can delete the links only if you've purchased the pro version. -->
                                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>. Distributed by
                                    <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#!" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</body>

</html>
