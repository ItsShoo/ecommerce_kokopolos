@extends('layouts.app')

@section('KokoPolosShop', 'Products')

@section('content')
    <h1>Products</h1>

    <form action="{{ route('products.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search products" value="{{ request('search') }}">
        <select name="category">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <select name="sort">
            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
            <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Price</option>
        </select>
        <select name="direction">
            <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
            <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
        </select>
        <button type="submit">Filter</button>
    </form>

    <div class="products">
        @foreach ($products as $product)
            <div class="product-card">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Price: Rp.{{ number_format($product->price, 2) }}</p>
                <p>Category: {{ $product->category->name }}</p>
                <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <button type="submit">Add to Cart</button>
                </form>
                <a href="{{ route('products.show', $product) }}">View Details</a>
            </div>
        @endforeach
    </div>

    {{ $products->links() }}
@endsection