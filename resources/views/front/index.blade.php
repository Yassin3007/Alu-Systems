@extends('layouts.front')
@section('content')

<!-- Start Carousel -->
<div class="container-fluid px-0 mb-5" onmouseover="carouselHover(this, false)" onmouseout="carouselHover(this, false)">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-inner">
            @foreach($sliders as $slider)
            <div class="carousel-item @if($loop->last)active @endif">
                <img class="w-100" src="{{$slider->getFirstMediaUrl('avatar')}}" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 head">
                                <h1 class="display-1 text-white mb-2 animated slideInRight land-text">{{__('index.Alusystems')}}</h1>
                                <h1 class="display-1 text-white mb-2 animated slideInRight land-text">{{$slider->name}}</h1>
                                <p class="fw-medium text-primary text-uppercase animated slideInRight">{!!$slider->description!!}</p>
                                <a href="{{route('sliderPage',$slider->id)}}" class="btn btn-primary animated slideInRight land-btn">{{__('index.GET STARTED')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">{{__('index.Previous')}}</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">{{__('index.Next')}}</span>
        </button>
    </div>
</div>
<!-- End Carousel -->


<!-- Start About -->
<div class="container-xxl py-5 about">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="row gx-3 h-100">
                    <div class="col-12 align-self-center wow fadeInDown" data-wow-delay="0.1s">
                        <img class="img-fluid about-img" src="{{asset('front/img/about-home.jpeg')}}">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s">
                <p class="fw-medium text-uppercase text-primary mb-2">{{__('index.About Us')}}</p>
                <h1 class="display-5 mb-4">{{__('index.Our Story')}}</h1>
                <p class="mb-4">
                <ul>
                    <li class="mb-3">
                        {{__('index.AluSystems was established in 2011 with a vision to provide perfect professional service to the construction field through fulfilling all the requirements of the clients and provide them the best & convenient service utilizing our most experience staff and state of art machinery.')}}
                    </li>
                    <li>
                        {{__('index.Our production facility covered area is 10,000.0 square meter with a workforce exceeding 500 employees. Accordingly we have more than 20 engineers in technical department using latest design software. our production facility is equipped with latest machinery in the field to provide the client with the quality and accuracy.')}}
                    </li>
                </ul>
                </p>
                <div class="row pt-2 mt-5 about-contact">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center mail">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-envelope-open text-white"></i>
                            </div>
                            <div class="email">
                                <p class="mb-2">{{__('index.Email us')}}</p>
                                <h5 class="mb-0">info@alusystems.com</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div class="call-us">
                                <p class="mb-2">{{__('index.Call us')}}</p>
                                <h5 class="mb-0"><bdi>+9665666333</bdi></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End About -->


<!-- Start Categories -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-5 mb-4 mt-5">{{__('index.Our Categories')}}</h1>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="category-item">
                    <div class="cont">
                        <img class="" src="{{$category->getFirstMediaUrl('avatar')}}" alt="">
                    </div>
                    <a href="{{route('getCategory',$category->id)}}">
                        <div class="d-flex">
                            <div class="info-text position-relative overflow-hidden d-flex flex-column justify-content-center w-100 " style="height: 70px;">
                                <h5>{{$category->name}}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End Categories -->


<!-- Start Our Clients -->
<div class="container-fluid bg-dark pt-2 my-5 px-0 clients">
    <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <h1 class="fw-medium text-uppercase text-primary mb-2">{{__('index.Our Clients')}}</h1>
        <p class="text-white mb-5">{{__('index.See What We Have Completed Recently')}}</p>
    </div>
    <div class="owl-carousel clients-carousel wow fadeIn" data-wow-delay="0.1s">
        @foreach($clients as $client)
        <a class="client" href="{{route('getClient',$client->id)}}">
            <img class="img-fluid" src="{{$client->getFirstMediaUrl('avatar')}}" alt="">
            <div class="client-title">
                <h5 class="text-primary mb-0">{{$client->name}}</h5>
            </div>
        </a>
        @endforeach

    </div>
</div>
<!-- End Our Clients -->

<!-- Start Facts -->
<div class="container-fluid facts my-5 p-5 ">
    <div class="row g-5">
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
            <div class="text-center border p-5">
                <i class="fa fa-certificate fa-3x text-white mb-3"></i>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">13</h1>
                <span class="fs-5 fw-semi-bold text-white">{{__('index.Years Experience')}}</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
            <div class="text-center border p-5">
                <i class="fa fa-users-cog fa-3x text-white mb-3"></i>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">939</h1>
                <span class="fs-5 fw-semi-bold text-white">{{__('index.Employees')}}</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
            <div class="text-center border p-5">
                <i class="fa fa-users fa-3x text-white mb-3"></i>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">100</h1>
                <span class="fs-5 fw-semi-bold text-white">{{__('index.Client Served')}}</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
            <div class="text-center border p-5">
                <i class="fa fa-check-double fa-3x text-white mb-3"></i>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">300</h1>
                <span class="fs-5 fw-semi-bold text-white">{{__('index.Project Completed')}}</span>
            </div>
        </div>
    </div>
</div>
<!-- End Facts -->
@endsection