@extends('_layouts.template')

@section('title')
File Listing APP | LOGIN
@endsection

@section('content')
<div class="container">
    <div class="col-md-4 offset-md-4 mt-5">
        {{-- Error Alert --}}
        @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Form Login</h3>
            </div>
            <form action="/login" method="post">
                @csrf
                <div class="card-body">

                    {{-- Form --}}
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                            required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <p class="text-center">
                        <a href="/register">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
