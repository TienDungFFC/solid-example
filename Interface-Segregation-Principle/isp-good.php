<?php
interface PayableMethod {
    public function pay();
}

interface RefundableMethod extends PaymentMethod {
    public function refund();
}

class CreditCard implements RefundableMethod {
    public function pay() {
    }

    public function refund() {
    }
}

class EWallet implements PayableMethod {
    public function pay() {
    }
}
