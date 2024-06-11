@extends('layouts.aap')
@section('content')

    <div class="container mt-5">
        <h1>Price</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('price.update', ['price' => $price]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Metal</label>
                <select name="metal" id="" class="form-control">
                    <option value="">Gold/Silver</option>
                    <option value="gold" {{$price->metal == 'gold' ? 'selected' : ''}}>Gold</option>
                    <option value="silver" {{$price->metal == 'silver' ? 'selected' : ''}}>Silver</option>
                </select>
            </div>
            <div class="form-group">
                <label for="carat">Carat</label>
                <input type="number" class="form-control" id="" name="carat" placeholder="Carat" value="{{ $price->carat }}">
            </div>
            <div class="form-group">
                <label for="Price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $price->price }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
