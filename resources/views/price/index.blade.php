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
                            <h1>Price</h1>
                            <a href="{{ route('price.create') }}" class="btn btn-light">Create Price</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Metal</th>
                                    <th>Carat</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($prices as $price)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ ucfirst($price->metal) }}</td>
                                        <td>{{$price->carat}}K</td>
                                        <td>₹ {{$price->price}}/gm</td>
                                        <td>
                                            <a href="{{ route('price.edit', $price->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('price.delete', $price->id) }}" class="btn btn-danger">Delete</a>

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
