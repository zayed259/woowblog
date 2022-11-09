@extends('layouts.frontend')

@section('pagetitle')
    Home
@endsection

@section('content')
<div class="col-md-6 mid">
    <div class="container">
        @auth
        <div class="card post-card">
            <div class="card-body create-post">
                @if ($user?->profile)
                <img src="{{url(Storage::url($user->profile->image))}}" class="img-profile rounded-circle" alt="Profile Image" width="40px">
                @else
                <img src="{{url('assets/img/avatar.jpg')}}" class="img-profile rounded-circle" alt="Profile Image" width="40px">
                @endif
                <a href="#" data-bs-toggle="modal" data-bs-target="#postModal" class="post-textarea">
                    Whats on your mind?
                </a>
            </div>
        </div>
        @endauth
        @foreach ($blogs as $blog)
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <div class="d-flex flex-row align-items-center post">
                    @if ($blog->user->profile)
                    <a href="{{url('profile/'.$blog->user->id)}}">
                        <img src="{{url(Storage::url($blog->user->profile->image))}}" class="img-profile rounded-circle" alt="Profile Image" width="40px">
                        <span>
                            <i class="fa-solid fa-circle"></i>
                        </span>
                    </a>
                    @else
                    <a href="{{url('profile/'.$blog->user->id)}}">
                        <img src="{{url('assets/img/avatar.jpg')}}" class="img-profile rounded-circle" alt="Profile Image" width="40px">
                        <span>
                            <i class="fa-solid fa-circle"></i>
                        </span>
                    </a>
                    @endif
                    <div class="post-middle">
                        <a href="{{url('profile/'.$blog->user->id)}}" class="fw-bold">
                            {{$blog->user->name}}
                            <i class="fas fa-check-circle text-success"></i>
                        </a>
                        <div class="d-flex flex-row align-items-center">
                            <a href="#" title="Public">
                                <i class="fas fa-globe-asia"></i>
                            </a>
                            <p class="m-0 ms-2 text-secondary">{{$blog->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </div>
                <!-- dropdown -->
                @auth
                @if ($blog->user_id == Auth::user()->id)
                <div class="dropdown post-action">
                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                        <li>
                            {{-- <a class="dropdown-item" href="{{url('blog/'.$blog->id.'/edit')}}">Edit</a> --}}
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editPostModal" class="dropdown-item">
                                Edit
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete</a>
                            <form id="delete-form" action="{{url('blog/'.$blog->id)}}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </li>
                    </ul>
                </div>
                @endif
                @endauth
            </div>
            <div class="card-body">
                @if ($blog->body)
                <p class="card-text">{!! $blog->body !!}</p>
                @endif
              <!-- image with lightbox  -->
                @if ($blog->image)
                <img src="{{url(Storage::url($blog->image))}}" alt="post image" class="w-100">
                @endif
            </div>
            <div class="card-footer">
                <div class="d-flex flex-row align-items-center justify-content-between likeCommentCount">
                    <div class="d-flex flex-row align-items-center">
                        <div>
                            100 likes
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <div class="me-2">
                            100 comments
                        </div>
                        <div>
                            100 shares
                        </div>
                    </div>
                </div>
                <hr>
                <div class="likeComment">
                    <a href="#" class="like">
                        <i class="far fa-thumbs-up"></i>
                        <span>Like</span>
                    </a>
                    <a href="#" class="comment">
                        <i class="far fa-comment"></i>
                        <span>Comment</span>
                    </a>
                    <a href="#" class="share">
                        <i class="fas fa-share"></i>
                        <span>Share</span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Post Modal -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="postModalLabel">Create Post</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{Form::open(['route' => 'blog.store','class'=>'user','enctype'=>'multipart/form-data'])}}

                <div class="form-group pb-3">
                    {!! Form::textarea('body', null, ['class'=>'form-control ckeditor', 'id'=>'body', 'placeholder'=>'Whats on your mind?']) !!}
                </div>
                <div class="form-group pb-3">
                    {!! Form::file('image', ['class'=>'form-control', 'id'=>'image']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Post', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                {{-- <form action="#">
                    <div class="form-group pb-3">
                        <textarea class="form-control" id="body" rows="3" placeholder="Whats on your mind?"></textarea>
                    </div>
                    <div class="form-group pb-3">
                        <input type="file" class="form-control" id="image">
                    </div>
                    <div class="form-group pb-3 d-grid">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
</div>
<!-- Edit Post Modal -->
<div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editPostModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editPostModal">Update Post</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{url(Storage::url($blog->image))}}" alt="post image" class="w-100">
                {!! Form::model($blog, ['method' => 'put', 'class' => 'user', 'enctype'=>'multipart/form-data', 'route' => ['blog.update', $blog->id]]) !!}
                
                <div class="form-group pb-3">
                    {!! Form::textarea('body', null, ['class'=>'form-control ckeditor', 'id'=>'body']) !!}
                </div>
                <div class="form-group pb-3">
                    {!! Form::file('image', ['class'=>'form-control', 'id'=>'image']) !!}
                </div>
    
                <div class="form-group">
                    {!! Form::submit('Update Post', ['class' => 'btn btn-primary btn-profile btn-block']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection