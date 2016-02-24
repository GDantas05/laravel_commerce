<div class="form-group">
    {!! Form::label('name', 'Name: ') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('category', 'Category: ') !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control', 'placeholder'=>'Selecione uma categoria']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description: ') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('price', 'Price: ') !!}
    {!! Form::number('price', null, ['class'=>'form-control']) !!}
</div>
@if(isset($product))
    <div class="form-group">
        {!! Form::label('featured', 'Featured: ') !!}
        {!! Form::checkbox('featured', null, $product->featured) !!}
    </div>
    <div class="form-group">
        {!! Form::label('recommend', 'Recommend: ') !!}
        {!! Form::checkbox('recommend', null, $product->recommend) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tags','Tags:(separadas por vírgula)') !!}
        {!! Form::textarea('tags', $product->tagList, ['class'=>'form-control']) !!}
    </div>
@else
    <div class="form-group">
        {!! Form::label('featured', 'Featured: ') !!}
        {!! Form::checkbox('featured', null, false) !!}
    </div>
    <div class="form-group">
        {!! Form::label('recommend', 'Recommend: ') !!}
        {!! Form::checkbox('recommend', null, false) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tags','Tags:(separadas por vírgula)') !!}
        {!! Form::textarea('tags', null, ['class'=>'form-control']) !!}
    </div>
@endif
