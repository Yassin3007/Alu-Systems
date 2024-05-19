@extends('layouts.front')
@section('content')
    <!-- Start Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">{{$slider->name}}</h1>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Start Products -->
    <div class="video">
        <video muted loop autoplay>
            <source src="{{$slider->getFirstMediaUrl('video')}}" type="video/mp4"/>
        </video>
    </div>
    <div class="container-xxl py-5 factory">
        <div class="container">
            <div class="row gy-5 gx-4 mt-5 justify-content-center">
            @foreach($slider->getMedia('images') as $image)
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="factory-image">
                        <img class="img-fluid" src="{{$image->getUrl()}}" alt="">
                    </div>
                </div>
                @endforeach
                
            </div>

            <div class="row gy-5 gx-4 mt-5 justify-content-center facilities">
                <h2 class="text-center wow fadeInUp" data-wow-delay="0.1s">Facilities</h2>
                <div class="facility-image col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="{{asset('front/img/facilities.jpeg')}}" alt="">
                </div>
                <div class="facility-info col-lg-10 mt-0 wow fadeInUp" data-wow-delay="0.1s">
                    <p style="text-align: center; font-size: 20px;">
                        {{$slider->facilities}}
                    </p>
                </div>
            </div>

            <div class="row gy-5 gx-4 mt-5 justify-content-center machinary ">
                <h2 class="text-center wow fadeInUp" data-wow-delay="0.1s">Machinary</h2>
                @foreach($slider->machines as $machine)
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="factory-image">
                        <img class="img-fluid" src="{{$machine->getFirstMediaUrl('avatar')}}" alt="">
                        <h3 class="text-center mt-2">{{$machine->name}}</h3>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- End Products -->

@endsection