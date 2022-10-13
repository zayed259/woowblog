@extends('layouts.admin')

@section('pagetitle')
    Trashed Blog
@endsection

@section('content')
<div class="card card-hover shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
        <h6 class="m-0 font-weight-bold text-light">Trashed Blog List</h6>
        <a href="{{url('blog')}}" class="btn btn-dark btn-circle btn-sm" title="Back to Blog List">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Content</th>
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
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->body }}</td>
                        <td class="d-flex justify-content-between">
                            {!! Form::open(['method' => 'post','route' => ['blogtrashed.destroy', $blog->id]]) !!}
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm btn-circle" title="Permanent Delete"><i class="fas fa-trash"></i></button>
                            {!! Form::close() !!}

                            {!! Form::open(['method' => 'post','route' => ['blogtrashed.restore', $blog->id]]) !!}
                                <button onclick="return confirm('Are you sure?')" class="btn btn-primary btn-sm btn-circle" title="Restore"><i class="fas fa-undo-alt"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection