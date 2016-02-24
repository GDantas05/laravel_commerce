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
            @include('products._form')
            <div class="form-group">
                {!! Form::submit('Add Product', ['class'=>'btn btn-primary']) !!}
                <a href="{{ route('products') }}" class="btn btn-primary">Back</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
