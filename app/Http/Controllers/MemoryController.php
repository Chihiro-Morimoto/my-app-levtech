<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Memory;

use App\Http\Requests\MemoryRequest;

class MemoryController extends Controller
{
    public function index(Memory $memory)
    {
        return view('memories/index')->with(['memories' => $memory->getPaginateByLimit()]);
    }
    
    public function show(Memory $memory)
    {
        $this->authorize('view', $memory);
        return view('memories/show')->with(['memory' => $memory]);
    }
    
    public function create()
    {
        return view('memories/create');
    }
    
    public function store(MemoryRequest $request, Memory $memory)
    {
        $input = $request['memory'];
        $input += ['user_id' => $request->user()->id];
        $memory->fill($input)->save();
        return redirect('/memories/'.$memory->id);
    }
    
    public function edit(Memory $memory)
    {
        $this->authorize('update', $memory);
        return view('memories/edit')->with(['memory' => $memory]);
    }
    
    public function update(MemoryRequest $request, Memory $memory)
    {
        $this->authorize('update', $memory);
        $input_memory = $request['memory'];
        $input_memory += ['user_id' => $request->user()->id];
        $memory->fill($input_memory)->save();
        return redirect('/memories/'.$memory->id);
    }
    
    public function delete(Memory $memory)
    {
        $this->authorize('delete', $memory);
        $memory->delete();
        return redirect('/memories');
    }
}
