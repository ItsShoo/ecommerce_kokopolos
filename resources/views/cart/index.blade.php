@extends('layouts.app')

@section('KokoPolosShop', 'Shopping Cart')

@section('content')
    <h1>Shopping Cart</h1>

    @if(count($cart) > 0)
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $details)
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>Rp.{{ number_format($details['price'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>Rp.{{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p>Total: Rp.{{ number_format($total, 2) }}</p>

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <button type="submit">Place Order</button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif
@endsection