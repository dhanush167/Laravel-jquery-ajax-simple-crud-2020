@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Registration</h2>
    <form id="form-register" method="post">
        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" />
        </div>
        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" />
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
        </div>
        <div class="from-group">
            <button type="button" class="btn btn-primary" name="btn-register" id="btn-register">Register</button>
        </div>
        <div class="text-success" id="register-status"></div>
        {{ csrf_field() }}
    </form>
</div>
@endsection
