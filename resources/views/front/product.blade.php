@extends('frontLayouts.main')
@section('title', 'Services - DentCare')
@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
            <h1 class="display-4" style="color: #DAA520">Products</h1>
        </div>
        <div class="container">
            <div class="row g-5">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="card text-center shadow-sm" style="width: 18rem; border-radius: 15px;">
                            <div class="card-body">
                                <img src="{{asset('storage/'. $product->images?->first()?->path)}}" alt="{{$product->name}}" class="card-img-top mb-4" style="border-radius: 10px;">
                                <h4 class="card-title">{{$product->name}}</h4>
                                <p class="card-text">Metal: {{$product->metal}}</p>
                                @php
                                    $price = \App\Models\Price::where(['carat' => $product->carat, 'metal' => $product->metal])->first()?->price;
                                @endphp
                                <p class="card-text">Price: &#8377; {{round($product->weight * $price)}}</p>
                                <a href="{{route('productDetails', ['product' => $product])}}" class="btn btn-primary btn-sm rounded-pill mt-2">
                                    <i class="bi bi-arrow-right"></i> Details
                                </a>
                                <a href="https://wa.me/?text={{route('productDetails', ['product' => $product])}}" target="_blank" class="btn btn-success btn-sm rounded-pill mt-2">
                                    <i class="bi bi-arrow-right"></i> Whatsapp
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Services End -->



    <!-- Testimonial End -->


@endsection
