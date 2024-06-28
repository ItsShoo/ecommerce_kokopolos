@extends('layouts.app')

@section('title', 'Order #' . $order->id)

@section('content')
    <h1>Order #{{ $order->id }}</h1>

    <p>Date: {{ $order->created_at->format('Y-m-d H:i') }}</p>
    <p>Status: {{ ucfirst($order->status) }}</p>

    <h2>Order Items</h2>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @if($items)
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>Rp.{{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp.{{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <p>Total: Rp.{{ number_format($order->total, 2) }}</p>
@endsection