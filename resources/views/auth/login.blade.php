@extends('layouts.admin.master')

@section('title','Login')

@section('content')
<div>
    <!-- Sucess -->
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>    
    @endif
    <form action="{{ route('login.action') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <input type="submit" class="btn btn-primary" value="Login">
        <a href="{{ route('registration.form') }}">Registration</a>
    </form>
</div>
@endsection
