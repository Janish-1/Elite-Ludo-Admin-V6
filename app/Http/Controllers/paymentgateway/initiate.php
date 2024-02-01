<?php

namespace App\Http\Controllers\paymentgateway;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Transaction\Transaction;

class initiate extends Controller
{
    public function showPaymentForm()
    {
        return view('razorpay-form'); // Create a new Blade view file for this
    }
}
