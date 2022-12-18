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
        return view('memories/show')->with(['memory' => $memory]);
    }
    
    public function create()
    {
        return view('memories/create');
    }
    
    public function store(MemoryRequest $request, Memory $memory)
    {
        $input = $request['memory'];
        $memory->fill($input)->save();
        return redirect('/memories/'.$memory->id);
    }
    
    public function edit(Memory $memory)
    {
        return view('memories/edit')->with(['memory' => $memory]);
    }
    
    public function update(MemoryRequest $request, Memory $memory)
    {
        $input_memory = $request['memory'];
        $memory->fill($input_memory)->save();
        return redirect('/memories/'.$memory->id);
    }
    
    public function delete(Memory $memory)
    {
        $memory->delete();
        return redirect('/memories');
    }
}
