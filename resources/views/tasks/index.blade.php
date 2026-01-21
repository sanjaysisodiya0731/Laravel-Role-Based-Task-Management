@extends('layouts.admin.master')

@section('title','Tasks List')

@section('content')
<div>
    <h3>Tasks List</h3>
    @if(auth()->user() && auth()->user()->role=="admin")
        <a href="{{route('task.create')}}" class="btn btn-primary">Add Task</a>
    @endif 
</div>

<!-- success message -->
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>SN</th>
            <th>Title</th>
            <th>Description</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $key=>$value)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->title}}</td>
            <td>{{$value->description}}</td>
            <td>{{$value->due_date}}</td>
            <td>{{$value->status}}</td>
            <td>
                @if(auth()->user() && auth()->user()->role=="admin")
                    <a class="btn btn-primary">Edit</a>
                    <form action="{{route('task.delete',$value->id)}}" method="POST" style="display:inline;" onsubmit="return confirm('Are you confirm?')">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger" />
                    </form>
                @endif
                
                @if(auth()->user() && auth()->user()->role=="manager")
                    <a href="{{ route('task.assign.create',$value->id) }}" class="btn btn-primary">Assign Task</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div class="d-flex">
    {{$tasks->links()}}
  </div>
@endsection