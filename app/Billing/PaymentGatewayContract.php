<?php

namespace App\Billing;

interface PaymentGatewayContract {

    public function setDiscount($variable);
    public function charge($variable);

}