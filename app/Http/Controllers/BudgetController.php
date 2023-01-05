<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Budget;

use App\Http\Requests\BudgetRequest;

use App\Models\Payment;

class BudgetController extends Controller
{
    public function index(Budget $budget)
    {
        return view('budgets/index')->with(['budgets' => $budget->getByLimit()]);
    }
    
    public function show(Budget $budget, Payment $payment)
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
        $input['balance'] = $input['estimate'];
        $input['saving'] = $input['balance'] * 100 / $input['estimate'];
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
        $input_budget['balance'] = $budget['balance'] - $budget['estimate'] + $input_budget['estimate'];
        $input_budget['saving'] = $input_budget['balance'] * 100 / $input_budget['estimate'];
        $budget->fill($input_budget)->save();
        return redirect('/budgets/'.$budget->id);
    }
    
    public function delete(Budget $budget)
    {
        $budget->delete();
        return redirect('/budgets');
    }
}
