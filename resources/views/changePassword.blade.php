@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Change Password</h2>
    <form id="form-change-password" method="post">
        <div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" />
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
        </div>
        <div class="from-group">
            <button type="button" class="btn btn-primary" name="btn-change-password" id="btn-change-password">Submit</button>
        </div>
        <div class="text-success" id="change-password-status"></div>
        {{ csrf_field() }}
    </form>
</div>
@endsection
