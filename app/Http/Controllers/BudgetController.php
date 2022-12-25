<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Budget;

use App\Http\Requests\BudgetRequest;

class BudgetController extends Controller
{
    public function index(Budget $budget)
    {
        return view('budgets/index')->with(['budgets' => $budget->getByLimit()]);
    }
    
    public function show(Budget $budget)
    {
        return view('budgets/show')->with(['budget' => $budget]);
    }
    
    public function create()
    {
        return view('/budgets/create');
    }
    
    public function store(BudgetRequest $request, Budget $budget)
    {
        $input = $request['budget'];
        $budget->fill($input)->save();
        return redirect('/budgets/'.$budget->id);
    }
    
    public function edit(Budget $budget)
    {
        return view('budgets/edit')->with(['budget' => $budget]);
    }
    
    public function update(BudgetRequest $request, Budget $budget)
    {
        $input_budget = $request['budget'];
        $budget->fill($input_budget)->save();
        return redirect('/budgets/'.$budget->id);
    }
    
    public function delete(Budget $budget)
    {
        $budget->delete();
        return redirect('/budgets');
    }
}
