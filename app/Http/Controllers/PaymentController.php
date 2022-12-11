<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PaymentRequest;

use App\Models\Payment;

use App\Models\Usage;

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
    
    public function store(PaymentRequest $request, Payment $payment)
    {
        $input = $request['payment'];
        $payment->fill($input)->save();
        return redirect('/payments/'.$payment->id);
    }
}
