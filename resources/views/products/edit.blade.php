@extends ('app')

@section ('content')
    <div class="container">
        <h1 class="text-center">Editing Product: {{ $product->name }}</h1>
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put']) !!}
            @include('products._form')
            <div class="form-group">
                {!! Form::submit('Edit Product', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        
    </div>
@endsection
