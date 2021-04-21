@extends('_layouts.template')

@section('title')
File Listing APP
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
                        @auth
                        <a href="/dashboard" class="btn btn-sm btn-primary">Dashboard</a>
                        <a href="/logout" class="btn btn-sm btn-danger">Logout</a>
                        @else
                        <a href="/login" class="btn btn-sm btn-primary">Log in</a>
                        <a href="/register" class="btn btn-sm btn-success">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered shadow-sm">
                    <tr class="text-center">
                        <th>Title</th>
                        <th>Upload Time</th>
                        <th>Author</th>
                    </tr>
                    @forelse ($file as $files)
                    <tr class="text-center">
                        <td>
                            <h5>{{ $files->title}}</h5>
                        </td>
                        <td>
                            <h5>{{ $files->created_at}}</h5>
                        </td>
                        <td>
                            <h5>{{$files->User->username}}</h5>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="3">
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
