@extends('layouts.front')
@section('content')
    <!-- Start Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">{{$project->name}}</h1>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Start Gallery -->
    <div class="gallery">
        <div class="container">
            <div class="row img-sec justify-content-center">
                <div class="col-lg-10">
                    <div class="gallery-imgs">
                    @foreach ($images as $image)
                        <div class="img wow fadeInUp">
                            <img src="{{$image->getUrl()}}" alt="">
                        </div>

                    @endforeach
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Gallery -->
@endsection