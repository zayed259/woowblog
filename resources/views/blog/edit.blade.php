@extends('layouts.frontend')

@section('pagetitle')
    Update Post
@endsection

@section('content')
    <div class="card card-hover shadow my-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold">Update Post</h6>
            <a href="{{ url('blogdetails/' . $blog->id) }}" class="btn btn-dark btn-circle btn-sm" title="Back to Blog List">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($blog, ['method' => 'put', 'class' => 'user', 'enctype'=>'multipart/form-data', 'route' => ['blog.update', $blog->id]]) !!}
            @include('blog.form')

            <div class="form-group">
                {!! Form::submit('Update Post', ['class' => 'btn btn-primary btn-profile btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
