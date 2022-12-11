<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(Payment $payment)
    {
        return view('payments/index')->with(['payments' => $payment->get()]);
    }
}
