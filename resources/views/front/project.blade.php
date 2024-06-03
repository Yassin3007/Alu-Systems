@extends('layouts.front')
@section('content')
 
    <!-- Start Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">{{$project->name}}</h1>
        </div>
    </div>
    <!--  End Page Header -->


    <!-- Start Project Description -->
    <div class="project-description">
        <div class="container">
            <div class="container-fluid pt-5 my-5 px-0 slider">
                <div class="row justify-content-center align-items-center" style="--bs-gutter-x: 0px">
                    <div class="swiper col-lg-7 col-md-10 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="swiper-wrapper">
                        @foreach ($images as $image)
                            <div class="swiper-slide">
                                <img class="img-fluid" src="{{$image->getUrl()}}" alt="">
                            </div>     
                        @endforeach                           
                        </div>    
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>

                    <div class="project-desc-info col-lg-5 col-md-10 wow fadeInUp" data-wow-delay="0.1s" data-wow-delay="0.1s">
                        <h3 class="mt-4 mb-3">{{$project->name}}</h3>
                        <span>{!!$project->data!!}</span>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- End Project Description -->
    
@endsection