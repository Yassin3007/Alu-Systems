
@extends('layouts.front')

@section('content')
    <!-- Start Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">{{$category->name}}</h1>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Start Category Description -->
    <div class="category-description">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 wow fadeInUp">
                    <h2 class="desc-title">Services</h2>
                    <p>
                      {!!$category->data!!}
                    </p>
                </div>
            </div>
            <div class="row img-sec">
                <div class="col-lg-10">
                    <h2 class="desc-title two">Projects</h2>
                    <div class="desc-imgs">
                        @foreach($category->projects as $project)
                       <a href="{{route('getProject',$project->id)}}">
                        <div class="img wow fadeInUp">
                            <img src="{{$project->media->first()->getUrl()}}" alt="">
                            <div class="title d-flex align-items-center justify-content-center">
                                <h4>{{$project->name}}</h4>
                            </div>
                        </div>
                       </a>
                       @endforeach
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Category Description -->

@endsection