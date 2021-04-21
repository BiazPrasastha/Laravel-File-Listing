@extends('_layouts.template')

@section('title')
File Listing APP | DASHBOARD
@endsection

@section('content')
<div class="container">
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Files List</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="/dashboard/create" class="btn btn-sm btn-success"> Upload File </a>
                        <a href="/" class="btn btn-sm btn-primary">Home</a>
                        <a href="/logout" class="btn btn-sm btn-danger">Logout</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered shadow-sm">
                    <tr class="text-center">
                        <th>Title</th>
                        <th>Dir</th>
                        <th>Author</th>
                        <th>Upload Time</th>
                        <th>Action</th>
                    </tr>
                    @forelse ($file as $files)
                    <tr class="text-center">
                        <td>
                            <h5>{{ $files->title}}</h5>
                        </td>
                        <td>
                            <h5>{{ $files->file}}</h5>
                        </td>
                        <td>
                            <h5>{{$files->User->username}}</h5>
                        </td>
                        <td>
                            <h5>{{ $files->created_at}}</h5>
                        </td>
                        <td>
                            <a href="/dashboard/{{$files->id}}/download" class="btn btn-primary">
                                Download </a>
                            <a href="/dashboard/{{$files->id}}/delete" class="btn btn-danger">
                                Delete </a>
                        </td>

                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="5">
                            <h5>File Empty</h5>
                        </td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
