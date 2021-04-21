@extends('_layouts.template')

@section('title')
File Listing APP | REGISTER
@endsection

@section('content')
<div class="container">
    <div class="col-md-4 offset-md-4 mt-5">
        {{-- Error Alert --}}
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Form Register</h3>
            </div>
            <form action="/register" method="post">
                @csrf
                <div class="card-body">

                    {{-- Form --}}
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password1" class="form-control" id="password"
                            placeholder="Confirm Password">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                    <p class="text-center">
                        <a href="/login">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
