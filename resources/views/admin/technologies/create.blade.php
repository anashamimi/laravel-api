@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Create Characters</h1>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invali

            @enderror" name="title"
                    id="title">

                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price">Price</label>
                <input type="text" class="form-control @error('price') is-invali

            @enderror" name="price"
                    id="price">

                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="5"
                    class="form-control @error('description') is-invali

            @enderror" name="description" id="description"></textarea>

                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="text" class="form-control @error('image') is-invali

            @enderror" name="image"
                    id="image">

                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                    <option value="">Select tech</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>

                @error('type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </div>
@endsection
