<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PaymentRequest;

use App\Models\Payment;

use App\Models\Usage;

use App\Models\Budget;

class PaymentController extends Controller
{
    public function index(Payment $payment)
    {
        return view('payments/index')->with(['payments' => $payment->getByLimit()]);
    }
    
    public function show(Payment $payment)
    {
        $this->authorize('view', $payment);
        return view('payments/show')->with(['payment' => $payment]);
    }
    
    public function create(Payment $payment, Usage $usage)
    {
        return view('payments/create')->with(['usages' => $usage->get()]);
    }
    
    public function store(PaymentRequest $request, Payment $payment, Budget $budget)
    {
        $input = $request['payment'];
        $input += ['user_id' => $request->user()->id];
        $input_budget = $budget->where('scheduled', $input['used_at'] )->first();
        $input['budget_id'] = $input_budget['id'];
        $payment->fill($input)->save();
        $input_budget['balance'] = $input_budget['balance'] - $input['expenditure'];
        $input_budget['saving'] = $input_budget['balance'] * 100 / $input_budget['estimate'];
        $budget = $input_budget;
        $budget->save();
        return redirect('/payments/'.$payment->id);
    }
    
    public function edit(Payment $payment, Usage $usage)
    {
        $this->authorize('update', $payment);
        return view('payments/edit')->with(['payment' => $payment, 'usages' => $usage->get()]);
    }
    
    public function update(PaymentRequest $request, Payment $payment, Budget $budget)
    {
        $this->authorize('update', $payment);
        $input_payment = $request['payment'];
        $input_budget = $budget->where('scheduled', $input_payment['used_at'] )->first();
        $input_payment['budget_id'] = $input_budget['id'];
        $input_budget['balance'] = $input_budget['balance'] + $payment['expenditure'] - $input_payment['expenditure'];
        $payment->fill($input_payment)->save();
        $input_budget['saving'] = $input_budget['balance'] * 100 / $input_budget['estimate'];
        $input_budget += ['user_id' => $request->user()->id];
        $budget = $input_budget;
        $budget->save();
        return redirect('/payments/'.$payment->id);
    }
    
    public function delete(Payment $payment, Budget $budget)
    {
        $this->authorize('delete', $payment);
        $input_budget = $budget->where('scheduled', $payment['used_at'] )->first();
        $input_budget['balance'] = $input_budget['balance'] + $payment['expenditure'];
        $input_budget['saving'] = $input_budget['balance'] * 100 / $input_budget['estimate'];
        $budget = $input_budget;
        $budget->save();
        $payment->delete();
        return redirect('/payments');
    }
}
