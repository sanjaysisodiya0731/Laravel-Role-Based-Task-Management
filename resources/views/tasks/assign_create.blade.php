@extends('layouts.admin.master')

@section('title','Assign Task')

@section('content')
<div>
    <h3>Assign  Task</h3>
</div>

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
<form action="{{ route('task.assign.store') }}" method="POST">
    @csrf
    <input type="hidden" name="task_id" value="{{$task->id}}">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$task->title}}" disabled>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{$task->description}}" disabled>
    </div>

    <div class="form-group">
        <label for="assigned_to">Select Employeee</label>
        <select id="assigned_to" name="assigned_to" class="form-select form-select-sm">
            <option value="">Please select</option>
            @foreach($employeeList as $value)
                <option value="{{$value->id}}">{{$value->first_name}} {{$value->last_name}}</option>
            @endforeach
        </select>
    </div>

    <input type="submit" class="btn btn-primary" value="Assign">
    <a href="{{ route('tasks.index') }}" class="btn btn-danger">Cancle</a>
</form>
@endsection
