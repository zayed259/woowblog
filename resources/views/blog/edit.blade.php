@extends('layouts.frontend')

@section('pagetitle')
    Blog
@endsection

@section('content')
    <div class="card card-hover shadow my-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold">Edit Blog</h6>
            <a href="{{ url('blogdetails/' . $blog->id) }}" class="btn btn-dark btn-circle btn-sm" title="Back to Blog List">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($blog, ['method' => 'put', 'class' => 'user', 'route' => ['blog.update', $blog->id]]) !!}
            
            @include('partial.flash')
            @include('partial.error')

            <div class="form-group pb-3">
                {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
                {!! Form::text('title', null, [
                    'required',
                    'class' => 'form-control',
                   'name' => 'title',
                    'id' => 'title',
                ]) !!}
            </div>
            <div class="form-group pb-3">
                {!! Form::label('body', 'Body', ['class' => 'form-label']) !!}
                {!! Form::textarea('body', null, ['class' => 'form-control ckeditor', 'name' => 'body', 'id' => 'body']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Blog', ['class' => 'btn btn-primary btn-profile btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
