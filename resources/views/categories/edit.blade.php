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
        {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'put']) !!}
            @include('categories._form')
            <div class="form-group">
                {!! Form::submit('Edit Category', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        
    </div>
@endsection
