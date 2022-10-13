@extends('layouts.frontend')

@section('pagetitle')
    Add Blog
@endsection

@section('content')
    <div class="card card-hover shadow my-4">
        <div class="card-header d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold">Add Blog</h6>
            <a href="{{url('/')}}" class="btn btn-dark btn-circle btn-sm" title="Back to Blog List">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <div class="card-body">
            {{Form::open(['route' => 'blog.store','class'=>'user','enctype'=>'multipart/form-data'])}}
            @include('blog.form')

            <div class="form-group">
                {!! Form::submit('Add Blog', ['class'=>'btn btn-primary btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

