@extends ('app')

@section ('content')
    <div class="container">
        <h1 class="text-center">Upload Image</h1>
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::open(['route' => ['products.images.store', $product->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('image', 'Image: ') !!}
                {!! Form::file('image', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Upload Image', ['class'=>'btn btn-primary']) !!}
                <a href="{{ route('products') }}" class="btn btn-primary">Back</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
