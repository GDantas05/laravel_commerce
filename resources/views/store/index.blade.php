@extends('store.store')
@section('categories')
    @include('store.categories_partial')
@stop
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--em destaque-->
            <h2 class="title text-center">Em destaque</h2>
                @foreach($pFeatured as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                @if(count($product->images))
                                    <img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" alt="" width="200"/>
                                @else
                                    <img src="{{ url('images/no-img.jpg') }}" alt="" width="200" />
                                @endif    
                                <h2>{{ $product->price }}</h2>
                                <p>{{ $product->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>{{ $product->price }}</h2>
                                    <p>{{ $product->name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div><!--em destaque-->

        <div class="features_items"><!--recomendados-->
            <h2 class="title text-center">Recomendados</h2>
            @foreach($pRecommend as $recommend)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            @if(count($recommend->images))
                                <img src="{{ url('uploads/'.$recommend->images->first()->id.'.'.$recommend->images->first()->extension) }}" alt="" width="200"/>
                            @else
                                <img src="{{ url('images/no-img.jpg') }}" alt="" width="200" />
                            @endif
                            <h2>{{ $recommend->price }}</h2>
                            <p>{{ $recommend->name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{ $recommend->price }}</h2>
                                <p>{{ $recommend->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--recomendados-->
    </div>
@stop