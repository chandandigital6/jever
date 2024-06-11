@extends('frontLayouts.main')
@section('title', 'Services - DentCare')
@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div id="productCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($product->images as $image)
                            <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                                <img src="{{asset('storage/'. $image->path)}}" class="d-block w-100" alt="{{$product->name}}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">

            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h2 class="card-title">{{$product->name}}</h2>
                    <p class="card-text">Carat: {{$product->carat}}</p>
                    <p class="card-text">Metal: {{$product->metal}}</p>
                    <p class="card-text">Weight: {{round($product->weight)}} gm</p>
                    @php
                        $price = \App\Models\Price::where(['carat' => $product->carat, 'metal' => $product->metal])->first()?->price;
                    @endphp
                    <p class="card-text">Price: ${{round($product->weight * $price)}}</p>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection
