@extends ('app')

@section ('content')
    <div class="container">
        <h1 class="text-center">Create Product</h1>
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::open(['route' => 'products.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description: ') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price: ') !!}
                {!! Form::number('price', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('featured', 'Featured: ') !!}
                {!! Form::checkbox('featured', null, false, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('recommend', 'Recommend: ') !!}
                {!! Form::checkbox('recommend', null, false, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Add Product', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        
    </div>
@endsection
