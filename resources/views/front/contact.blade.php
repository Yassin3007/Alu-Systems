@extends('layouts.front')
@section('content')


    <!-- Start Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">{{__('index.Contact Us')}}</h1>
        </div>
    </div>
    <!-- End Page Header -->


    <!-- Start Contact -->
    <div class="container-xxl py-5 contact">
        <div class="container">
            <div class="row g-5 justify-content-center mb-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light text-center h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <h4 class="mb-3">{{__('index.Phone Number')}}</h4>
                        <p class="mb-4"><bdi>+9665666333</bdi></p>
                        <a class="btn btn-primary px-4" href="tel:+9665666333">{{__('index.Call Now')}} <i
                                class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-light text-center h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                            <i class="fa fa-envelope-open fa-2x text-primary"></i>
                        </div>
                        <h4 class="mb-3">{{__('index.Email Address')}}</h4>
                        <p class="mb-4">info@alusystems.com</p>
                        <a class="btn btn-primary px-4" href="mailto:info@alusystems.com">{{__('index.Email Now')}} <i
                                class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light text-center h-100 p-5">
                        <div class="btn-square bg-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                            <i class="fa fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <h4 class="mb-3">{{__('index.Office Address')}}</h4>
                        <p class="mb-4"><bdi>+012 345 67890</bdi></p>
                        <a class="btn btn-primary px-4" href="https://maps.app.goo.gl/AsR7qp8iAnyGS5Y79?g_st=ic"
                            target="blank">{{__('index.Direction')}} <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <iframe class="w-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3627.1189627160484!2d46.8652606!3d24.619584399999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2fa6ffb81bcec7%3A0x2b04d1c35e5de564!2z2LTYsdmD2Kkg2YXYtdmG2Lkg2KPZhti42YXYqSDYp9mE2KfZhNmF2YbZitmI2YUg2KfZhNij2YbYtNin2KbZig!5e0!3m2!1sen!2ssa!4v1711107679417!5m2!1sen!2ssa"
                        frameborder="0" style="min-height: 450px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fw-medium text-uppercase text-primary mb-2">{{__('index.Contact Us')}}</p>
                    <h1 class="display-5 mb-4">{{__('index.If You Have Any Queries, Please Feel Free To Contact Us')}}</h1>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                                    <i class="fa fa-phone-alt text-white"></i>
                                </div>
                                <div class="call-us">
                                    <h6>{{__('index.Call Us')}}</h6>
                                    <span><bdi>+9665666333</bdi></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                                    <i class="fa fa-envelope text-white"></i>
                                </div>
                                <div class="email">
                                    <h6>{{__('index.Mail Us')}}</h6>
                                    <span>info@alusystems.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <form method="post" action="{{route('messages.store')}}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="{{__('index.Your Name')}}">
                                    <label for="name">{{__('index.Your Name')}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="{{__('index.Your Email')}}">
                                    <label for="email">{{__('index.Your Email')}}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="{{__('index.Subject')}}">
                                    <label for="subject">{{__('index.Subject')}}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" placeholder="{{__('index.Message')}}" id="message"
                                        style="height: 150px; resize: none;"></textarea>
                                    <label for="message">{{__('index.Message')}}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="submit">{{__('index.Send Message')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->

@endsection