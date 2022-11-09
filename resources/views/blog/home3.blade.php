@extends('layouts.frontend')

@section('pagetitle')
    Home
@endsection

@section('content')
    {{-- new post --}}
    @auth
    <div class="container">
        <div class="card">
            <div class="card-body create-post">
                @if ($user?->profile)
                <a href="{{url('profile/'.$user->id)}}" class="post-image">
                    <img src="{{url(Storage::url($user->profile->image))}}" class="img-profile rounded-circle" alt="Profile Image" width="40px">
                </a>
                @else
                <a href="{{url('profile/'.$user->id)}}" class="post-image">
                    <img src="{{url('assets/img/avatars/avatar.jpg')}}" class="img-profile rounded-circle" alt="Profile Image" width="40px">
                </a>
                @endif
                <a href="#" data-toggle="modal" data-target="#postModal" class="post-textarea">
                    Whats on your mind?
                </a>
            </div>
        </div>
    </div>
    @endauth
    
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-12 py-2">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            @if ($blog->user->profile)
                            <a href="{{url('profile/'.$blog->user->id)}}">
                                <img src="{{url(Storage::url($blog->user->profile->image))}}" class="img-profile rounded-circle" alt="Profile Image" width="40px">
                            </a>
                            @else
                            <a href="{{url('profile/'.$blog->user->id)}}">
                                <img src="{{url('assets/img/avatars/avatar.jpg')}}" class="img-profile rounded-circle" alt="Profile Image" width="40px">
                            </a>
                            @endif
                            <div class="ml-2">
                                <a href="{{url('profile/'.$blog->user->id)}}">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        {{$blog->user->name}}
                                        <i class="fas fa-check-circle text-success"></i>
                                    </h6>
                                </a>
                                <p class="m-0 text-secondary">{{$blog->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    @auth
                        @if ($blog->user_id == Auth::user()->id)
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{url('blog/'.$blog->id.'/edit')}}">Edit</a>
                                <form action="{{url('blog/'.$blog->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="dropdown-item">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endif
                        @endauth
        
                        {{-- @if (Auth::user() && Auth::user()->role == '2')
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
                        @endif --}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{!! $blog->body !!}</p>
                        <div class="btn-group">
                            @if ($blog->image)
                            <a href="{{url(Storage::url($blog->image))}}" data-toggle="lightbox" data-title="Image" data-footer="Image" data-gallery="gallery">
                                <img src="{{url(Storage::url($blog->image))}}" class="text-center" alt="Image" width="200px">
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                {{-- like count --}}
                                <div>
                                    100 likes
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                {{-- comment count --}}
                                <div class="mr-2">
                                    100 comments
                                </div>
                                {{-- share count --}}
                                <div>
                                    100 shares
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex flex-row align-items-center justify-content-between text-center">
                            <div class="d-flex flex-row align-items-center">
                                @auth
                                {{-- @if ($blog->likes?->where('user_id', Auth::user()->id)->count() > 0) --}}
                                @if (0 > 0)
                                <a href="{{url('blog/'.$blog->id.'/unlike')}}" class="btn btn-link text-primary">
                                    <i class="fas fa-thumbs-up"></i>
                                    Like
                                </a>
                                @else
                                <a href="{{url('blog/'.$blog->id.'/like')}}" class="btn btn-link text-secondary">
                                    <i class="far fa-thumbs-up"></i>
                                    Like
                                </a>
                                @endif
                                @else
                                <a href="{{url('blog/'.$blog->id.'/like')}}" class="btn btn-link text-secondary">
                                    <i class="far fa-thumbs-up"></i>
                                    {{-- <span class="text-secondary">{{$blog->likes->count()}}</span> --}}
                                    <span class="text-secondary">33</span>
                                </a>
                                @endauth
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <a href="{{url('blog/'.$blog->id)}}" class="btn btn-link text-secondary">
                                    <i class="far fa-comment"></i>
                                    Comment
                                </a>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <a href="{{url('blog/'.$blog->id)}}" class="btn btn-link text-secondary">
                                    <i class="fas fa-share"></i>
                                    Share
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {!! $blogs->links() !!}
    </div>



    <!-- Post Modal-->
    <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">Create Post</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </div>
                <div class="modal-body">
                    {{Form::open(['route' => 'blog.store','class'=>'user','enctype'=>'multipart/form-data'])}}
                    @include('blog.form')

                    <div class="form-group">
                        {!! Form::submit('Post', ['class'=>'btn btn-primary btn-block']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection