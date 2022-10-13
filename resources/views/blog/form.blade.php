@include('partial.flash')
@include("partial.error")

<div class="form-group pb-3">
    {!! Form::label('title', 'Title', ['class' => 'form-label']); !!}
    {!! Form::text('title', null, ['required', 'class'=>'form-control', 'id'=>'title', 'placeholder'=>'Title']) !!}
</div>
<div class="form-group pb-3">
    {!! Form::label('body', 'Body', ['class' => 'form-label']); !!}
    {!! Form::textarea('body', null, ['class'=>'form-control ckeditor', 'id'=>'body']) !!}
</div>
