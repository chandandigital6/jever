@extends('frontLayouts.main')
@section('title', 'Services - DentCare')
@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">product</h5>
                <h1 class="display-4">Product</h1>
            </div>
            <div class="row g-5">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">

                            <div class="service-icon mb-4">
                                <img src="{{asset('storage/'. $product->images?->first()?->path)}}" alt="" style="width: 100%; border-radius: 10px;">
                            </div>
                            <h4 class="mb-3">{{$product->name}}</h4>
                            <p class="m-0">{{$product->carat}}</p>
                            <p class="m-0">{{$product->metal}}</p>
                            <p class="m-0">{{round($product->weight)}}/gm</p>
                            @php
                                $price = \App\Models\Price::where(['carat' => $product->carat, 'metal' => $product->metal])->first()?->price;
                            @endphp
                            <p class="m-0">{{round($product->weight * $price)}}</p>
                            <a class="btn btn-lg btn-primary rounded-pill" href="">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Services End -->



    <!-- Testimonial End -->


@endsection
