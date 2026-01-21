<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\TaskAssign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy('id','desc')
        ->paginate(2);
        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = ['pending', 'in-progress', 'completed'];
        return view('tasks.create',compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'status' => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'created_by' => Auth::user()->id,
            'status' => $request->status
        ];

        $task = Task::create($data);

        return redirect()->route('tasks.index')->with('success','Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        Task::where('id',$id)->delete();

        return redirect()->route('tasks.index')->with('success','Deleted successfully');
    }
    
    public function createAssign($id)
    {
        $employeeList = User::whereIn('role',['employee'])->get();
        $task = Task::where('id',$id)->first();
        return view('tasks.assign_create',compact('employeeList','task'));
    }

    public function storeAssign(Request $request){
        $request->validate([
            'task_id'=> 'required',
            'assigned_to'=>'required',
        ]);

        $data = [
            'task_id' => $request->task_id,
            'assigned_to' => $request->assigned_to,
            'assigned_by' => Auth::user()->id
        ];

        $assign = TaskAssign::create($data);
        return redirect()->route('tasks.index')->with('success','Task assigned successfully');
    }

    public function assignedList(){
        $loginId = Auth::user()->id;
        $taskAssignedList = TaskAssign::with([
            'task' => function($query){
                $query->select('*');
            },
            'assignedByManager' => function($query){
                $query->select('*');
            }
        ])
        ->where('assigned_to',$loginId)
        ->get();
        return view('tasks.assigned_task_list',compact('taskAssignedList'));
    }
}
