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
        {!! Form::open(['route' => ['products.update', $product->id], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category', 'Category: ') !!}
                {!! Form::select('category_id', $categories, $product->category->id, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description: ') !!}
                {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price: ') !!}
                {!! Form::number('price', $product->price, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('featured', 'Featured: ') !!}
                {!! Form::checkbox('featured', null, $product->featured) !!}
            </div>
            <div class="form-group">
                {!! Form::label('recommend', 'Recommend: ') !!}
                {!! Form::checkbox('recommend', null, $product->recommend) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Edit Product', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        
    </div>
@endsection
