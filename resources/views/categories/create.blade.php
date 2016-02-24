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
            @include('categories._form')
            <div class="form-group">
                {!! Form::submit('Add Category', ['class'=>'btn btn-primary']) !!}
                <a href="{{ route('categories') }}" class="btn btn-primary">Back</a>
            </div>
        {!! Form::close() !!}
        
    </div>
@endsection
