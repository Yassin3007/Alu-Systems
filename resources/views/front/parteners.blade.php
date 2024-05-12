@extends('layouts.front')
@section('content')


    <!-- Start Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">{{__('index.Parteners')}}</h1>
        </div>
    </div>
    <!-- End Page Header -->


    <!-- Start Parteners -->
    <div class="container-xxl py-5 parteners">
        <div class="container">
            @foreach($partners as $partner )
            <div class="row wow fadeInUp mb-5" >
                <div class="part">
                    <div class="part-img">
                        <img src="{{$partner->getFirstMediaUrl('avatar')}}" alt="">
                        <div class="part-info">
                            <p>
                                {!!$partner->data!!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
      
        </div>
    </div>
    <!-- End Parteners -->

@endsection