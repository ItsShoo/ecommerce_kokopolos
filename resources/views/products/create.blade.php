@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<div class="container">
    <h1>Create New Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <x-forms.input 
            name="name" 
            label="Product Name" 
            :value="old('name')" 
            required
        />

        <x-forms.textarea 
            name="description" 
            label="Product Description" 
            :value="old('description')" 
            required
        />

        <x-forms.input 
            name="price" 
            label="Price" 
            type="number" 
            :value="old('price')" 
            required
        />

        <x-forms.input 
            name="stock" 
            label="Stock" 
            type="number" 
            :value="old('stock', 0)" 
            required
        />

        <x-forms.select 
            name="category_id" 
            label="Category" 
            :options="$categories" 
            :selected="old('category_id')" 
            required
        />

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image_url" name="image_url">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="featured" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                <label class="custom-control-label" for="featured">Featured Product</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>
@endsection