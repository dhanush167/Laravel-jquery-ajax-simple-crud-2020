@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Forgot Password</h2>
    <form id="form-forgot-password" method="post">
        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" />
        </div>
        <div class="from-group">
            <button type="button" class="btn btn-primary" name="btn-forgot-password" id="btn-forgot-password">Submit</button>
        </div>
        <div class="text-success" id="forgot-password-status"></div>
        {{ csrf_field() }}
    </form>
</div>
@endsection
