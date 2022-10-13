@extends('layouts.frontend')

@section('pagetitle')
    Blog
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-12 py-2">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <h4 class="my-0 fw-normal">{{ $blog->title }}</h4>
                        @if (Auth::user() && Auth::user()->role == '2')
                            @if ($blog->ishide == 0)
                                {!! Form::open(['method' => 'put','route' => ['blog.hideshow', $blog->id]]) !!}
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-warning btn-sm btn-circle" title="Hide/Show Button">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['method' => 'put','route' => ['blog.hideshow', $blog->id]]) !!}
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-success btn-sm btn-circle" title="Hide/Show Button">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                {!! Form::close() !!}
                            @endif
                        @endif
                    </div>
                    <div class="card-body">
                        <p class="card-text">{!!Str::limit($blog->body, 300)!!}</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-10 pb-2">
                                <div>
                                    <small class="text-muted"><strong>Created by: </strong> {{$blog->user?->name}} | <strong>Post Created: </strong>{{$blog->created_at->diffForHumans()}} | <strong> Last updated:</strong> {{$blog->updated_at->diffForHumans()}}</small>
                                </div>
                            </div>
                            <div class="btn-group col-md-2">
                                <a href="{{route('blog.blogdetails', $blog->id)}}" class="btn btn-sm btn-outline-secondary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {!! $blogs->links() !!}
    </div>
@endsection