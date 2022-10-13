@extends('layouts.frontend')

@section('pagetitle')
    Blog details
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-2">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="my-0 fw-normal">{{ $blog->title }}</h4>
                        @if (Auth::user() && Auth::user()->id == $blog->user_id || Auth::user() && Auth::user()->role == 2)
                        <div class="btn-group">
                            <a href="{{route('blog.edit', $blog->id)}}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <a href="{{route('blog.delete', $blog->id)}}" class="btn btn-sm btn-outline-secondary" onclick="return confirm('Are you sure?')">Delete</a>
                        </div>
                        @endif
                        {{-- <a href="{{url('blog/'.$blog->id.'/edit')}}" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fas fa-edit"> </i> Edit</a> --}}
                    </div>
                    <div class="card-body">
                        {{-- <h5 class="card-title">{{$blog->title}}</h5> --}}
                        <p class="card-text">{!!$blog->body!!}</p>
                    </div>
                    <div class="card-footer">
                        <div>
                            <small class="text-muted"><strong>Created by: </strong> {{$blog->user->name}} | <strong>Post Created: </strong>{{$blog->created_at->diffForHumans()}} | <strong> Last updated:</strong> {{$blog->updated_at->diffForHumans()}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- comment form --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 fw-normal">Add A Comment</h4>
                    </div>
                    <div class="card-body">
                        {{Form::open(['route' => 'comment.store','class'=>'user'])}}
                        <div class="form-group mb-2">
                            {{-- {!! Form::label('body', 'Comment', ['class' => 'form-label']); !!} --}}
                            {!! Form::textarea('body', null, ['required', 'class'=>'form-control', 'id'=>'body', 'placeholder'=>'Write here...']) !!}
                        </div>
                        {{Form::hidden('blog_id', $blog->id)}}
                        <div class="form-group">
                            {!! Form::submit('Add Comment', ['class'=>'btn btn-primary btn-block']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Comments</h5>
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($comments as $comment)
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{$comment->user->name}}</h5>
                                <p class="card-text">{{$comment->body}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">{{$comment->created_at}}</small>
                                    @if (Auth::user() && Auth::user()->role == '2')
                                        {{-- isHide button  --}}
                                        @if ($comment->ishide == 0)
                                        {!! Form::open(['method' => 'put','route' => ['comment.hideshow', $comment->id]]) !!}
                                            <button onclick="return confirm('Are you sure?')" class="btn btn-warning btn-sm btn-circle" title="Hide/Show Button">
                                                <i class="fas fa-eye-slash"></i>
                                            </button>
                                        {!! Form::close() !!}
                                        @else
                                            {!! Form::open(['method' => 'put','route' => ['comment.hideshow', $comment->id]]) !!}
                                                <button onclick="return confirm('Are you sure?')" class="btn btn-success btn-sm btn-circle" title="Hide/Show Button">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection