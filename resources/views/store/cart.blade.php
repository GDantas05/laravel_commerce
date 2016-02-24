@extends('store.store')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class=ïmage>Item</td>
                            <td class="description">Description</td>
                            <td class="price">Price</td>
                            <td class="qtd">Qtd</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cart->all() as $k=>$item)
                        <tr>
                            <td class="cart_product">
                                <a href="#">
                                    Imagem
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('store.product', ['id' => $k]) }}">{{ $item['name'] }}</a></h4>
                                <p>Código: {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{ number_format($item['price'], 2, ", ", ".") }}
                            </td>
                            <td class="cart_quantity">
                                {{ $item['qtd'] }}
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">R$ {{ number_format($item['price'] * $item['qtd'], 2, ", ", ".") }}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{ route('cart.destroy', ['id' => $k]) }}" class="cart_quantity_delete">Delete</a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <p class="alert alert-warning">Nenhum produto no carrinho</p>    
                                </td>
                            </tr>
                        @endforelse
                        <tr class="cart_menu">
                            <td colspan="6">
                                <div class="pull-right">
                                    <span>Total: R$ {{ number_format($cart->getTotal(), 2, ", ", ".") }}</span>
                                    <a href="{{ route ('checkout.place') }}" class="btn btn-success">Finalizar Pedido</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop