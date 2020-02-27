<?php 

namespace App\Orders;

use App\Billing\PaymentGatewayContract;

class OrderDetail {

    private $paymentGateway;

    public function __construct(PaymentGatewayContract $paymentGateway) {
        $this->paymentGateway = $paymentGateway;
    }

    public function all()
    {
        $this->paymentGateway->setDiscount(500);
        
        return [
            'name' => 'ABC',
            'address' => '123 Street'
        ]; 
    }
}