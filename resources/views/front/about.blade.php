@extends('layouts.front')
@section('content')

    <!-- Start Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">{{__('index.About Us')}}</h1>
        </div>
    </div>
    <!-- Start Page Header -->


    <!-- Start About -->
    <div class="container-xxl py-5 about">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="row gx-3 h-100">
                        <div class="col-12 align-self-center wow fadeInDown" data-wow-delay="0.1s">
                            <img class="img-fluid about-img" src="{{asset('front/img/aluminum/3.jpeg')}}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.2s">
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
                </div>
            </div>

            <div class="row g-5 mt-5 wow fadeInUp" data-wow-delay="0.2s">
                <h3>{{__('index.Management message')}} ..</h3>
                <p class="mt-2">{{__('index.We started our journey in July 4, 2011 with one Aluminum fabrication line and we continue over the year to build our brand name, our product lines, our team and reputation.')}}</p>
                <p class="mt-2">{{__('index.Now a days Alusystems pride are the engineering team, state of art machineries, and client’s confidents and trust.')}}</p>
                <div class="d-flex align-items-center mb-0 mt-0">
                    <div class="p-4 check-icons">
                        <p><i class="fa fa-check text-primary"></i>{{__('index.Three Aluminum production lines')}}</p>
                        <p><i class="fa fa-check text-primary"></i>{{__('index.Two glass fabrication lines')}}</p>
                        <p><i class="fa fa-check text-primary"></i>{{__('index.Sophisticated steel production line')}}</p>
                        <p><i class="fa fa-check text-primary"></i>{{__('index.Fire rated metal door')}}</p>
                        <p><i class="fa fa-check text-primary"></i>{{__('index.Fire rated wooden door')}}</p>
                        <p><i class="fa fa-check text-primary"></i>{{__('index.Powder coating facility')}}</p>
                        <p><i class="fa fa-check text-primary"></i>{{__('index.Powder coating facility')}}</p>
                        <p class="mb-0"><i class="fa fa-check text-primary"></i>{{__('index.More than 200,000 square meter production capacity.')}}</p>
                    </div>
                </div>
                <p class="mt-3">{{__('index.Taking into consideration that during the year we were customer oriented which enable us to achieve our success story.')}}</p>
                <p class="mt-1 mb-5">{{__('index.For the future we in Alusystem continue concentrating on our client’s needs with best services latest engineering solution with the highest technological ways.')}}</p>
                <div class="row pt-2 about-contact">
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
    <!-- End About -->

    @endsection