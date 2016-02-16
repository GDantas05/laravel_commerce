@extends ('app')

@section ('content')
    <div class="container">
        <h1 class="text-center">Editing Category: {{ $category->name }}</h1>
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description: ') !!}
                {!! Form::textarea('description', $category->description, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Edit Category', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        
    </div>
@endsection
