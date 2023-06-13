@extends('layouts.app')

@section('content')
<div class="container">


    <h1>Edit Chracter: {{ $product->title }}</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                value="{{ old('title', $product->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price">price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                 value="{{ old('price', $product->price) }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" cols="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image">Imgage</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" name="image" id="image"
                 value="{{ old('image', $product->image) }}">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type_id">Type tech</label>
            <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                <option value="">Select tech</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}"
                        {{ $type->id == old('type_id', $product->type_id) ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
</div>

@endsection
