@extends('store.store')
@section('content')
    
<div class="container">
    <h3>Meus Pedidos</h3>
    <table class="table">
        <tbody>
            <tr>
                <th>Id do Pedido</th>
                <th>Items do pedido</th>
                <th>Valor do Pedido</th>
                <th>Status do Pedido</th>
            </tr>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                    <ul>
                        @foreach ($order->items as $item)
                            <li>{{ $item->product->name }}</li>
                        @endforeach    
                    </ul>
                </td>
                <td>{{ number_format($order->total, 2, ", ", ".") }}</td>
                <td>{{ $order->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop