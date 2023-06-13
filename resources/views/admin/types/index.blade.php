@extends('layouts.app')

@section('content')
    <h1 class=" text-center text-uppercase p-4">Books Cards</h1>
    <div class="container">
        <div class="text-center m-5">
            <a class="btn btn-success" href="{{ route('admin.products.create') }}">Crea nuovo characters</a>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            @foreach ($products as $product)
                <div class="card text-bg-dark mb-3 col-4 shadow">
                    <div class="card-header m-auto">
                        <img class="img-fluid" src="{{ $product->image }}" alt="{{ $product->title }}">
                    </div>
                    <div class="card-body">
                        <h4 class="fs-4 card-title fw-bold text-center text-capitalize py-2">{{ $product->title }}</h4>
                        <p class="card-text">{{ $product->title }}</p>
                        <p class="card-text">price: {{ $product->price }}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <a class="m-1" href="{{ route('admin.products.show', $product->id) }}"><button
                                    class="btn btn-success"> Show</button></a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-1" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
