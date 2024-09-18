<?php 

/**
 * Class Order bị phụ thuộc trực tiếp bởi class CreditCard
 * Nếu muộn thay đổi phương thức thanh toán khác thì phải thay đổi code làm tăng sự phức tạp, phát sinh bug
 */
Class Order {
    private $payment;
    public function __construct()
    {
        $this->payment = new CreditCard();
    }
    public function Pay() {
        $this->payment->pay();
    }
}

class Payment {
    public function pay() {}
}