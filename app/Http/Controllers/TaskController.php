<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    
    public function index(){
        $tasks = auth()->user()->tasks;
        return view('tasks.index', compact('tasks'));
    }

    public function create(){
        return view('tasks.create');
    }

    public function store(Request $request){
        $request->validate([
            'task_name' => ['required'],
            'task_details' => ['required']
        ]);

        Task::create([
            'task_name' => $request->get('task_name'),
            'task_details' => $request->get('task_details'),
            'user_id'=>auth()->user()->id
        ]);

        return redirect('/tasks')->with('msg', 'New task added successfully!');
    }

    public function edit(Task $task){
        return view('tasks.edit', compact('task'));
    }

    public function update(Task $task, Request $request){
        $request->validate([
            'task_name' => ['required'],
            'task_details' => ['required']
        ]);

        $task->update([
            'task_name' => $request->get('task_name'),
            'task_details' => $request->get('task_details')
        ]);

        return redirect('/tasks')->with('msg', 'Task updated successfully');
    }

    public function destroy(Task $task){
        $task->delete();
        return redirect('/tasks')->with('deleted', 'Task deleted successfully');
    }

    public function show(Task $task){
        return view('tasks.show', compact('task'));
    }

    public function markTaskAsCompleted(Request $request){
        $id = $request->get('id');
        $task = Task::findOrFail($id);
        if($task->user_id == Auth::user()->id){
            $task->checkOffTask();
            if($task->task_status === true){
                return redirect()->back()->with('success', 'Task Completed!');
            }else{
                return redirect()->back();
            }
        }
    }
}


