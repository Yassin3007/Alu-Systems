<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ALU System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="{{asset('front/css/all.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('front/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Customized CSS Stylesheet -->
    @if(LaravelLocalization::getCurrentLocale() =='en')
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">
    @else
    <link href="{{asset('front/css/style-rtl.css')}}" rel="stylesheet">
    @endif
</head>

<body>
    <!-- Start Spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- End Spinner -->


    <!-- Start Topbar -->
    <div class="container-fluid bg-dark px-0 topbar">
        <div class="row g-0 d-none d-lg-flex">
            <div class="col-lg-6 social">
                <div class="h-100 d-inline-flex align-items-center text-white">
                    <span>{{__('index.Follow Us')}}:</span>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 call">
                <div class="h-100 topbar-right d-inline-flex align-items-center text-white py-2 px-5">
                    <span class="fs-5 fw-bold icon"><i class="fa fa-phone-alt"></i>{{__('index.Call Us')}}:</span>
                    <span class="fs-5 fw-bold"><bdi>+9665666333</bdi></span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->


    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0">
        <a href="index.html" class="navbar-brand me-0">
            <h1 class="text-white m-0"><img src="{{asset('front/img/logo.png')}}" alt="logo" class="logo"></h1>
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav p-4 p-lg-0">
                <a href="{{route('index')}}" class="nav-item nav-link active">{{__('index.home')}}</a>
                <a href="{{route('about')}}" class="nav-item nav-link">{{__('index.About')}}</a>
                <a href="{{route('products')}}" class="nav-item nav-link">{{__('index.Products')}}</a>
                <a href="{{route('projects')}}" class="nav-item nav-link">{{__('index.OurProjects')}}</a>
                <a href="{{route('partners')}}" class="nav-item nav-link">{{__('index.Our Partners')}}</a>
                <a href="{{route('certificates')}}" class="nav-item nav-link">{{__('index.Certificates')}}</a>
                <a href="{{route('contact')}}" class="nav-item nav-link">{{__('index.Contact Us')}}</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{app()->getLocale()}}</a>
                    <div class="dropdown-menu bg-light m-0">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                        @endforeach
                    </div>
                </div>
                <!-- <ul class="switch nav-link">
                    <input id="language-toggle" class="check-toggle check-toggle-round-flat" type="checkbox">
                    <label for="language-toggle"></label>
                    
                    <li class="on">ع</li>
                    <li class="off">EN</li>
                </ul> -->
            </div>
        </div>
    </nav>
    <!-- End Navbar -->



    @yield('content')

    <!-- Start Footer -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6">
                    <h5 class="text-white mb-4">{{__('index.Our Office')}}</h5>
                    <div class="d-flex address">
                        <i class="fa fa-map-marker-alt"></i>
                        <p class="mb-3">3299 - Al Mishael Dist.
                            Unit No 9 Riyadh 14327 - 7171 Kingdom of Saudi Arabia</p>
                    </div>
                    <p class="mb-3 phone"><i class="fa fa-phone-alt"></i><bdi>+9665666333</bdi></p>
                    <p class="mb-3 mail"><i class="fa fa-envelope"></i>info@alusystems.com</p>
                    <div class="d-flex pt-3 social-links">
                        <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 links">
                    <h5 class="text-white mb-4">{{__('index.Quick Links')}}</h5>
                    <a class="btn btn-link" href="{{route('about')}}">{{__('index.About Us')}}</a>
                    <a class="btn btn-link" href="{{route('products')}}">{{__('index.Products')}}</a>
                    <a class="btn btn-link" href="{{route('projects')}}">{{__('index.Projects')}}</a>
                    <a class="btn btn-link" href="{{route('partners')}}">{{__('index.Our Parteners')}}</a>
                    <a class="btn btn-link" href="{{route('certificates')}}">{{__('index.Certificates')}}</a>
                    <a class="btn btn-link" href="{{route('contact')}}">{{__('index.Contact Us')}}</a>
                </div>
                <div class="col-lg-4 col-md-6 align-self-center">
                    <h5 class="text-white mb-4">{{__('index.Our Certificates')}}</h5>
                    <div class="d-flex">
                        <img class="cer-img" src="{{asset('front/img/cer-1.jpg')}}" alt="">
                        <img class="cer-img" src="{{asset('front/img/cer-2.jpg')}}" alt="">
                        <img class="cer-img" src="{{asset('front/img/cer-3.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer -->

    <!-- Start Copyright -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container text-center">
            <p class="mb-2">Copyright &copy; <a class="fw-semi-bold" href="#">ALU System</a>, All Right Reserved.
            </p>
        </div>
    </div>
    <!-- End Copyright -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('front/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('front/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('front/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('front/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/lib/counterup/counterup.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('front/js/main.js')}}"></script>
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
</body>

</html>