@extends('_layouts.template')

@section('title')
File Listing APP | UPLOAD FILE
@endsection

@section('content')
<div class="container">
    <div class="col-md-8 offset-md-2 mt-5">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h3>Upload File - {{ Auth::user()->username }}</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="/dashboard/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="File Title" required>
                    </div>
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <a href="/dashboard" class="btn btn-danger">Cancel</a>
                        <button class="btn btn-primary"> Upload File </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
