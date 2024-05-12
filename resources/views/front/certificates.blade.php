@extends('layouts.front')
@section('content')


    <!-- Start Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">{{__('index.Certificates')}}</h1>
        </div>
    </div>
    <!-- End Page Header -->


    <!-- Start Certificates -->
    <div class="container-xxl py-5 certificates">
        <div class="container">
            <h2>{{__('index.OUR CERTIFICATES')}}</h2>
            @foreach($certificates as $certificate)
            <div class="wow fadeInUp">
                <img src="{{$certificate->getFirstMediaUrl('avatar')}}" alt="">
            </div>
            <hr>
            @endforeach
           
        </div>
    </div>
    <!-- End Certificates -->

@endsection