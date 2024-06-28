@extends('layouts.app')

@section('KokoPolosShop', $category->name)

@section('content')
    <div class="container">
        <h1>{{ $category->name }}</h1>
        <p>{{ $category->description }}</p>
        <br/>
        <br/>
        <h2>Products in this category</h2>

        <div class="row">
            @forelse ($category->products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($product->image_url)
                            <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <p class="card-text"><strong>Price: Rp.{{ number_format($product->price, 2) }}</strong></p>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No products found in this category.</p>
            @endforelse
        </div>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
    </div>
@endsection