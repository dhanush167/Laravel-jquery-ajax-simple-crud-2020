@extends('layouts.app')

@section('content')

<div class="container">
    <hr />
    <h2>Login</h2>
    <form id="form-login" method="post">
        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" />
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
        </div>
        <div class="from-group">
            <button type="button" class="btn btn-primary" name="btn-login" id="btn-login">Login</button>
            <a href="/forgotPassword">Did you forget your password?</a>
        </div>
        <div class="text-success" id="login-status"></div>
        {{ csrf_field() }}
    </form>
</div>
@endsection
