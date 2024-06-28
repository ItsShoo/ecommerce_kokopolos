@extends('layouts.app')

@section('KokoPolosShop', 'Welcome to Koko Polos Shop')

@section('content')
    <div class="hero">
        <h1>Welcome To Koko Polos Shop</h1>
        <p>Discover amazing products at great prices!</p>
    </div>

    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-grid">
            @foreach ($featuredProducts as $product)
                <div class="product-card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->category->name }}</p>
                    <p class="price">Rp.{{ number_format($product->price, 2) }}</p>
                    <a href="{{ route('products.show', $product) }}" class="btn">View Product</a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="categories">
        <h2>Shop by Category</h2>
        <div class="category-grid">
            @foreach ($categories as $category)
                <a href="{{ route('categories.show', $category) }}" class="category-card">
                    <img src="{{ $category->image_url }}" alt="{{ $category->name }}">
                    <h3>{{ $category->name }}</h3>
                </a>
            @endforeach
        </div>
    </section>

    <section class="latest-products">
        <h2>Latest Products</h2>
        <div class="product-grid">
            @foreach ($latestProducts as $product)
                <div class="product-card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->category->name }}</p>
                    <p class="price">Rp.{{ number_format($product->price, 2) }}</p>
                    <a href="{{ route('products.show', $product) }}" class="btn">View Product</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection