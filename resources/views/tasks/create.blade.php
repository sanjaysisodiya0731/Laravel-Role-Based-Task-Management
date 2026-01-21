@extends('layouts.admin.master')

@section('title','Create Task')

@section('content')

<!-- display errors -->
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
        @endforeach
    </ul>
</div>
@endif 
<form action="{{ route('task.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Enter description">
    </div>

    <div class="form-group">
        <label for="due_date">Due Date</label>
        <input type="date" class="form-control" id="due_date" name="due_date" placeholder="Choose date">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select id="status" name="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected>Please select</option>
            @foreach($status as $sts)
                <option value="{{$sts}}">{{$sts}}</option>
            @endforeach
        </select>
    </div>
    
    <input type="submit" class="btn btn-primary" value="Create">
    <a href="{{route('tasks.index')}}" class="btn btn-danger">Cancle</a>
</form>
@endsection