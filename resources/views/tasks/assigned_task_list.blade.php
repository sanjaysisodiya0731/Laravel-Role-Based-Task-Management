@extends('layouts.admin.master')

@section('Title',"Assigned Task List")

@section('content')
<h2>Assigned Task List</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">SN</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Assign By</th>
            <th scope="col">Assigned Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($taskAssignedList as $key=>$task)
        <tr>
            
            <td>{{$key+1}}</td>
            <td>{{$task->task->title}}</td>
            <td>{{$task->task->description}}</td>
            <td>
                {{ $task->assignedByManager->first_name ?? '-' }}
                {{ $task->assignedByManager->last_name ?? '' }}
            </td>
            <td>
                {{$task->created_at}}
            </td>
            <td>
                <a herf="#" class="btn btn-primary">Comment</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection