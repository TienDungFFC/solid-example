<?php 

interface PaymentMethod {
    public function pay();
    public function refund();
}

class CreditCard implements PaymentMethod {
    public function pay() {
    }

    public function refund() {
    }
}

class EWallet implements PaymentMethod {
    public function pay() {

    }

    public function refund() {
        // ví dụ ở đây ewallet không có refund nhưng vẫn phải implement
    }
}