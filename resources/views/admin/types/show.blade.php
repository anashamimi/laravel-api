@extends('layouts.app')

@section('content')
    <div class="p-4 h-full text-bg-dark">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <h1 class=" text-center fw-bold fs-2 py-4 text-uppercase">{{ $product->title }}</h1>
        <div class=" d-flex justify-content-between px-5">
            <div class="py-3">
                <p class="text-bg-success d-inline-block p-2">PRICE: {{ $product->price }}</p>
                <p class=" w-50">{{ $product->description }}</p>
            </div>

            <img class="img-fluid" src="{{ $product->image }}" alt="{{ $product->title }}">
        </div>

        <div class="p-5 d-flex align-items-center">
            <a class="m-1" href="{{ route('admin.products.edit', $product->id) }}"><button
            class="btn btn-success"> Edit</button></a>

            <a class="m-1" href="{{ route('admin.products.index') }}"><button
                class="btn btn-warning"> Back</button></a>
        </div>

    </div>

@endsection
