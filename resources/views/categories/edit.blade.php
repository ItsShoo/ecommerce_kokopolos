@extends('layouts.app')

@section('KokoPolosShop', 'Edit Category')

@section('content')
    <div class="container">
        <h1>Edit Category: {{ $category->name }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $category->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image_url">Image</label>
                <input type="file" class="form-control-file" id="image_url" name="image_url">
                @if ($category->image_url)
                    <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="mt-2" style="max-width: 200px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back to Categories</a>
    </div>
@endsection