@extends('layouts.app')

@section('KokoPolosShop', 'Edit Product')

@section('content')
<div class="container">
    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 

        <x-forms.input 
            name="name" 
            label="Product Name" 
            :value="old('name', $product->name)"
            required
        />

        <x-forms.textarea 
            name="description" 
            label="Product Description" 
            :value="old('description', $product->description)"
            required
        />

        <x-forms.input 
            name="price" 
            label="Price" 
            type="number" 
            :value="old('price', $product->price)" 
            required
        />

        <x-forms.input 
            name="stock" 
            label="Stock" 
            type="number" 
            :value="old('stock', $product->stock)" 
            required
        />

        <x-forms.select 
            name="category_id" 
            label="Category" 
            :options="$categories" 
            :selected="old('category_id', $product->category_id)"
            required
        />

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
            @if ($product->image_url)
                <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" width="100">
            @endif
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="featured" name="featured" value="1" {{ old('featured', $product->featured) ? 'checked' : '' }}>
                <label class="custom-control-label" for="featured">Featured Product</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection