@extends('layouts.admin.master')

@section('title','Registration')

@section('content')
<div>
    <form action="{{ route('registration.action') }}" method="POST">
        @csrf

        <!-- Display Erros -->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif 
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>

        <div class="form-group">
            <label for="role">Select Role</label>
            <select class="form-control" id="role" name="role">
                <option value="" selected disabled>Please select</option>
                @if(Auth::check())
                    <option value="admin">Admin</option>
                @endif  
                    <option value="manager">Manager</option>
                    <option value="employee">Employee</option>   
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Registration">
        <a href="{{ route('login') }}">Login</a>
    </form>
</div>
@endsection