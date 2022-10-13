@extends('layouts.admin')

@section('pagetitle')
    Comments
@endsection

@section('content')
<div class="card card-hover shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
        <h6 class="m-0 font-weight-bold text-light">Comments</h6>
        {{-- <div>
            <a class="btn btn-dark btn-sm" href="{{url('blogtrashed')}}">
                <i class="fas fa-trash-alt fa-sm"></i>
                Trashed
            </a>
        </div> --}}
    </div>
    
    @include('partial.flash')
    @include('partial.error')
    <!-- Card Body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Blog</th>
                        <th>Comment</th>
                        <th>isHide</th>
                        <th width="50px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $sl = 1;
                    @endphp
                    @foreach ($comments as $comment)
                    <tr>
                        <td>{{$sl++}}</td>
                        <td>{{$comment->user->name}}</td>
                        <td>{{$comment->blog->title}}</td>
                        <td>{{$comment->body}}</td>
                        <td>{{$comment->ishide}}</td>
                        <td class="d-flex justify-content-between">
                            {{-- {!! Form::open(['method' => 'get','route' => ['blog.delete', $blog->id]]) !!}
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm btn-circle">
                                    <i class="fas fa-trash"></i>
                                </button>
                            {!! Form::close() !!} --}}
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
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection