@extends('store.store')
@section('categories')
    @include('store.partial.categories')
@stop
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--em destaque-->
            <h2 class="title text-center">{{ $category->name }}</h2>
            @include('store.partial.product', ['products' => $products])
        </div><!--em destaque-->
    </div>
@stop