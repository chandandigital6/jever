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

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="metal">Metal</label>
                <select name="metal" id="" class="form-control">
                    <option value="">Select metal</option>
                    <option value="gold">Gold</option>
                    <option value="silver">Silver</option>
                </select>
            </div>
            <div class="form-group">
                <label for="carat">Carat</label>
                <input type="text" class="form-control" id="carat" name="carat" value="{{ old('carat') }}" required>
            </div>

            <div class="form-group">
                <label for="weight">Weight (grams)</label>
                <input type="text" class="form-control" id="weight" name="weight" value="{{ old('weight') }}" required>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
