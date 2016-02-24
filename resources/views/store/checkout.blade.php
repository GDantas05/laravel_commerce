@extends('store.store')
@if (isset($categories))
    @section('categories')
        @include('store.partial.categories')
    @stop
@endif    
@section('content')
    
<div class="container">
    @if (isset($cart))
        <h3>Carrinho de compras vazio!</h3>    
    @else
        <h3>Pedido realizado com sucesso!</h3>
        <p>O pedido #{{ $order->id }}, foi ralizado com sucesso.</p>
    @endif
</div>
@stop