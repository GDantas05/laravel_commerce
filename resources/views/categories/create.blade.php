@extends ('app')

@section ('content')
    <div class="container">
        <h1 class="text-center">Create Category</h1>
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::open(['route' => 'categories.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description: ') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Add Category', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        
    </div>
@endsection
