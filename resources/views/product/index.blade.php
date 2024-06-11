@extends('layouts.aap')

@section('content')


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>Products</h1>
                            <a href="{{route('product.create')}}" class="btn btn-light">Create Product</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="" method="GET" class="mb-4">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Metal</th>
                                    <th>Carat</th>
                                    <th>Price</th>
                                    <th>Weight</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($products as $product)
                                    <tr >
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{asset('storage/'. $product->images?->first()?->path)}}" alt="{{$product->name}}" style="width: 80px; height: auto; border-radius: 50%;"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->metal }}</td>
                                        <td>{{$product->carat.'K'}}</td>
                                        @php
                                            $price = \App\Models\Price::where(['carat' => $product->carat, 'metal' => $product->metal])->first()?->price;
                                        @endphp
                                        <td>{{$product->weight * $price}}</td>
                                        <td>{{$product->weight}}</td>
                                        <td>
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger">Delete</a>
                                            <!-- Add delete button if needed -->

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No posts found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        <!-- Pagination links can be added here if needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
