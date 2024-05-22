@extends('layouts.front')
@section('content')

    <!-- Start Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">{{__('index.Products')}}</h1>
        </div>
    </div>
    <!-- End Page Header -->


    <!-- Start Products -->
    <div class="container-xxl py-5 products">
        <div class="container">
            <div class="row gy-5 gx-4 justify-content-center">
                @foreach($products as $product)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item">
                        <img class="img-fluid" src="{{$product->getFirstMediaUrl('avatar')}}" alt="">
                        <div class="product-detail">
                            <div class="product-title">
                                <hr class="w-25">
                                <h3 class="mb-0 text-center">{{$product->name}}</h3>
                                <hr class="w-25">
                            </div>
                        </div>
                        <a class="btn btn-light" href="{{route('getSubProducts',$product->id)}}">{{__('index.Read More')}}</a>
                    </div>
                </div>
                @endforeach
                
            </div>
            <div class="row g-5 mt-5 wow fadeInUp" data-wow-delay="0.1s">
                <h3>{{__('index.And Much More')}} …</h3>
                <p class="mt-2">{{__('index.This is should be a prospective customer’s number one call to action, e.g., requesting a quote or perusing your product catalog.')}}</p>
                <div class="d-flex align-items-center mb-0 mt-0">
                    <div class="p-4 check-icons">
                        <p><i class="fa fa-check text-primary"></i>{{__('index.Sky Light')}}</p>
                        <p><i class="fa fa-check text-primary"></i>{{__('index.Shutters')}}</p>
                        <p><i class="fa fa-check text-primary"></i>{{__('index.Sophisticated steel production line')}}</p>
                        <p><i class="fa fa-check text-primary"></i>{{__('index.Louvers')}}</p>
                        <p><i class="fa fa-check text-primary"></i>{{__('index.Canopies')}}</p>
                        <p><i class="fa fa-check text-primary"></i>{{__('index.Windows & Doors')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Products -->

@endsection