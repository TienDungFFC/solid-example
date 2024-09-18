<?php 

interface PayMethod {
    public function pay(); 
}

class CreditCardPayment implements PayMethod {
    public function pay() {
        // implment the payment
    }
}

class MomoPayment implements PayMethod {
    public function pay() {

    }
}

class PaymentFactory {
    public function initPayment($type) {
        switch ($type) {
            case "credit":
                return new CreditCardPayment();
            case "momo":
                return new MomoPayment();
            default: 
                throw new Exception("Unknown payment type");
        }
    }
}

class Order {
    public function pay($type) {
        $paymentFactory = new PaymentFactory();
        $payment = $paymentFactory->initPayment($type);
        $payment->pay();
    }
}