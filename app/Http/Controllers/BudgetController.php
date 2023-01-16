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
        $this->authorize('view', $budget);
        return view('budgets/show')->with(['budget' => $budget]);
    }
    
    public function create()
    {
        return view('/budgets/create');
    }
    
    public function store(BudgetRequest $request, Budget $budget, Payment $payment)
    {
        $input = $request['budget'];
        $input_payment = $payment->where('used_at', $input['scheduled'] )->first();
        if(empty($input_payment)){
            $input_payment = ['expenditure' => 0];
        }
        $input['balance'] = $input['estimate'] - $input_payment['expenditure'];
        $input['saving'] = $input['balance'] * 100 / $input['estimate'];
        $input += ['user_id' => $request->user()->id];
        $budget->fill($input)->save();
        return redirect('/budgets/'.$budget->id);
    }
    
    public function edit(Budget $budget)
    {
        $this->authorize('update', $budget);
        return view('budgets/edit')->with(['budget' => $budget]);
    }
    
    public function update(BudgetRequest $request, Budget $budget)
    {
        $this->authorize('update', $budget);
        $input_budget = $request['budget'];
        $input_budget['balance'] = $budget['balance'] - $budget['estimate'] + $input_budget['estimate'];
        $input_budget['saving'] = $input_budget['balance'] * 100 / $input_budget['estimate'];
        $input_budget += ['user_id' => $request->user()->id];
        $budget->fill($input_budget)->save();
        return redirect('/budgets/'.$budget->id);
    }
    
    public function delete(Budget $budget)
    {
        $this->authorize('delete', $budget);
        $budget->delete();
        return redirect('/budgets');
    }
}
