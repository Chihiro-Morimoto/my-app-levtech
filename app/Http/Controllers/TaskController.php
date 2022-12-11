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
        $input['checked']=false;
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
        $task->fill($input)->save();
        return redirect('/tasks/'.$task->id);
    }
    
    public function delete(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }
    
    public function check(TaskRequest $request, Task $task)
    {
        $input = $request->boolean('checked');
        if($input==true){
            $input = false;
        }else{
            $input = true;
        }
        $task->checked->fill($input)->save();
        return redirect('/tasks');
        
        
    }

}