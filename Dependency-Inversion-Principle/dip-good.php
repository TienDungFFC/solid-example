<?php 

Class Order {
    private $payment;
    public function __construct(PaymentMethod $payment)
    {
        $this->payment = $payment;
    }
    public function Pay() {
        $this->payment->pay();
    }
}

interface PaymentMethod {
    public function pay();
}

class CreditCard implements PaymentMethod {
    public function pay() {}
}

class Momo implements PaymentMethod{
    public function pay() {
    }
}

$momo = new Momo();
$order = new Order($momo);
$order->pay();

$credit = new CreditCard();
$order = new Order($credit);
$order->pay();