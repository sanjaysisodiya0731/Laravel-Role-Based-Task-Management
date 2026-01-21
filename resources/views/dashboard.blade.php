@extends('layouts.admin.master')

@section('title','Dashboard')

@section('content')
    <div>
        <h4>Welcome, {{@Auth::user()->first_name}} {{@Auth::user()->last_name}}</h4>
    </div>
@endsection

