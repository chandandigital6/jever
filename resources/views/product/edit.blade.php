@extends('layouts.aap')
@section('content')

    <div class="container mt-5">
        <h1>Create Product</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('product.update', ['product' => $product]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple >

                <div class="row justify-content-start gap-3">
                    @foreach($product->images as $image)
                        <div class="col-md-2 position-relative">
                            <img src="{{asset('storage/'. $image->path)}}" alt="" style="width: 100%; height: auto;">
                            <a href="{{route('productImageDelete', ['image' => $image])}}" class="position-absolute btn btn-danger p-1" style="margin-left: -20px">x</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="image">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="title">Metal</label>
                <select name="metal" id="" class="form-control">
                    <option value="">Select</option>
                    <option value="gold" {{$product->metal == 'gold' ? 'selected' : ''}}>Gold</option>
                    <option value="silver" {{$product->metal == 'silver' ? 'selected' : ''}}>Silver</option>
                </select>
            </div>
            <div class="form-group">
                <label for="carat">Carat</label>
                <input type="text" class="form-control" id="carat" name="carat" value="{{ $product->carat }}" required>
            </div>

            <div class="form-group">
                <label for="weight">Weight (Gram)</label>
                <input type="text" class="form-control" id="weight" name="weight" value="{{ $product->weight }}" required>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
