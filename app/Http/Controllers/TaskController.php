<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index(Task $task)
    {
        return view('tasks/index')->with(['tasks' => $task->getByLimit()]);
    }
    
    public function show(Task $task)
    {
        return view('tasks/show')->with(['task' => $task]);
    }
    
    public function create()
    {
        return view('tasks/create');
    }
    
    public function store(TaskRequest $request, Task $task)
    {
        $input = $request['task'];
        $input['checked'] = false;
        $input += ['user_id' => $request->user()->id];
        $task->fill($input)->save();
        return redirect('/tasks/'.$task->id);
    }
    
    public function edit(Task $task)
    {
        return view('tasks/edit')->with(['task' => $task]);
    }
    
    public function update(TaskRequest $request, Task $task)
    {
        $input = $request['task'];
        $input += ['user_id' => $request->user()->id];
        $task->fill($input)->save();
        return redirect('/tasks/'.$task->id);
    }
    
    public function delete(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }
}