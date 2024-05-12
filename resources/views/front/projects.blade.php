@extends('layouts.front')
@section('content')


    <!-- Start Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">{{__('index.Projects')}}</h1>
        </div>
    </div>
    <!-- End Page Header -->


    <div class="projects">
        <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s" style="margin: 0;">
        @foreach($projects as $project)

            <div class="col-lg-4 col-md-6 project">
                <a href="kafd-2.08.html">
                    <img src="{{$project->media->first()->getUrl()}}" alt="">
                    <span>{{$project->name}}</span>
                </a>
            </div>
            @endforeach

        </div>
    </div>

    <!-- Start Projects -->
   
    <!-- End Projects -->

@endsection