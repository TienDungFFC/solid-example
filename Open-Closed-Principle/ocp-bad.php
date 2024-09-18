<?php 

/**
 * Mỗi lần thêm một phương thức thanh toán mới lại cần phải vào class payment này để sửa
 * Bởi mỗi phương thức thanh toán sở hữu rất nhiều thông tin cần thiết như authorize, process, status,... 
 * Dẫn đến class Payment trở nên rất cồng kềnh khó kiểm soát
 */
class Payment {
    public function payWithCredtirCard() {
        echo "Pay with a credit card";
    }

    public function payWithMomo() {
        echo "Pay with momo";
    }
    

    // pay with something...
}

class Order {
    public function pay($type) {
        $payment = new Payment();
        switch ($type) {
            case "credit":
                $payment->payWithCredtirCard();
            case "momo":
                $payment->payWithMomo();
        }
    }
}