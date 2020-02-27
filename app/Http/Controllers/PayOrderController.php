<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetail;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    public function store(OrderDetail $order_detail, PaymentGatewayContract $payment_gateway)
    {
        $order = $order_detail->all();
        dd($payment_gateway->charge(900));
    }
}
