@extends('layouts.app')

@section('KokoPolosShop', $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>Price: Rp.{{ number_format($product->price, 2) }}</p>
    <p>Category: {{ $product->category->name }}</p>
    <p>In Stock: {{ $product->stock }}</p>

    <form action="{{ route('cart.add', $product) }}" method="POST">
        @csrf
        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}">
        <button type="submit">Add to Cart</button>
    </form>
@endsection