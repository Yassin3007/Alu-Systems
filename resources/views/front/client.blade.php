@extends('layouts.front')
@section('content')
    <!-- Start Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">{{$client->name}}</h1>
        </div>
    </div>
    <!-- End Page Header -->


    <!-- Start Project Description -->
    <div class="project-description">
        <div class="container">
            <div class="container-fluid pt-5 my-5 px-0 slider">
                <div class="owl-carousel clients-carousel wow fadeIn" data-wow-delay="0.1s">
                    @foreach($project->getMedia('images') as $image)
                    <span class="project-desc-img" href="">
                        <img class="img-fluid" src="{{$image->getUrl()}}" alt="">
                    </span>
                    @endforeach
        
                </div>
            </div>
            <div class="project-desc-info wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="mt-4 mb-3">{{$project->name}}</h3>
                <!-- <p class="mb-2">ProjectValue: 58,000,000SR</p>
                <p class="mb-2">MainContractor: ALUSYSTEMS Consultant: JLL</p> -->
                <p>
                    {!!$project->data!!}
                </p>
            </div>
        </div>
    </div>
    <!-- End Project Description -->

@endsection