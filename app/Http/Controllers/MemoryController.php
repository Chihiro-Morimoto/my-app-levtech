<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Memory;

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
}
