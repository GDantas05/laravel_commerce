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
                        @foreach($cart->all() as $k=>$item)
                        <tr>
                            <td class="cart_product">
                                <a href="#">
                                    Imagem
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="#">{{ $item['name'] }}</a></h4>
                                <p>Código: {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{ $item['price'] }}
                            </td>
                            <td class="cart_quantity">
                                R$ {{ $item['qtd'] }}
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">R$ {{ $item['price'] * $item['qtd'] }}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="" class="cart_quantity_delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop