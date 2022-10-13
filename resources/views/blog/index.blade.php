@extends('layouts.admin')

@section('pagetitle')
    Blog
@endsection

@section('content')
<div class="card card-hover shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
        <h6 class="m-0 font-weight-bold text-light">Blogs</h6>
        <div>
            <a class="btn btn-dark btn-sm" href="{{url('blogtrashed')}}">
                <i class="fas fa-trash-alt fa-sm"></i>
                Trashed
            </a>
        </div>
    </div>
    
    @include('partial.flash')
    @include('partial.error')
    <!-- Card Body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>isHide</th>
                        <th width="50px">Action</th>
                    </tr>
                </thead>
                @php
                $sl = 1;
                @endphp
                <tbody>
                    @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $sl++ }}</td>
                        <td>{{ $blog->user->name }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->body }}</td>
                        <td>{{ $blog->ishide }}</td>
                        <td class="d-flex justify-content-between">
                            {!! Form::open(['method' => 'get','route' => ['blog.delete', $blog->id]]) !!}
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm btn-circle">
                                    <i class="fas fa-trash"></i>
                                </button>
                            {!! Form::close() !!}
                            {{-- isHide button  --}}
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
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection