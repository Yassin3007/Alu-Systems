@extends('layouts.front')
@section('content')

    <!-- Start Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">{{__('index.More Products')}}</h1>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Start More Products -->
    <div class="more-products">
        <div class="container">
            <div class="img-sec">
                    <!-- <h2 class="desc-title two">More Products</h2> -->
                    @foreach($subProducts as $product)
                    <div class="row holder">
                        <div class="img wow fadeInUp col-lg-7">
                            <div class="title d-flex align-items-center justify-content-center">
                                <h4>{{$product->name}}</h4>
                            </div>
                            <img src="{{$product->getFirstMediaUrl('avatar')}}" alt="">
                        </div>
                        <div class="wow fadeInUp col-lg-5 description">
                            <p>
                                {!!$product->data!!}
                            </p>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
    <!-- End More Products -->

@endsection