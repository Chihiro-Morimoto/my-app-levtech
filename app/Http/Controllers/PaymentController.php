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
        return view('payments/show')->with(['payment' => $payment]);
    }
    
    public function create(Payment $payment, Usage $usage)
    {
        return view('payments/create')->with(['usages' => $usage->get()]);
    }
    
    public function store(PaymentRequest $request, Payment $payment, Budget $budget)
    {
        $input = $request['payment'];
        $input_budget = $budget->where('scheduled', $input['used_at'] )->first();
        $input['budget_id'] = $input_budget['id'];
        $payment->fill($input)->save();
        return redirect('/payments/'.$payment->id);
    }
    
    public function edit(Payment $payment, Usage $usage)
    {
        return view('payments/edit')->with(['payment' => $payment, 'usages' => $usage->get()]);
    }
    
    public function update(PaymentRequest $request, Payment $payment)
    {
        $input_payment = $request['payment'];
        $payment->fill($input_payment)->save();
        return redirect('/payments/'.$payment->id);
    }
    
    public function delete(Payment $payment)
    {
        $payment->delete();
        return redirect('/payments');
    }
}
