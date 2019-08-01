<?php

namespace App\Helper;

class Helper
{
    public static function orderStatus($id = null)
    {
        $status = [
            1 => 'Order Checkout',
            // 2 => 'Order Placed',
            3 => 'Order Success',
            4 => 'Delivery Boy Pickup Order',
            5 => 'Delivery Boy To Customer',
            6 => 'Delivered',
            7 => 'Return',
            8 => 'Cancelled',
        ];

        if($id) {
            return $status[$id];
        }
        
        return $status;
    }

    public static function orderSummary($id = null)
    {
        $status = [
            1 => 'Your order is in Check out.',
            // 2 => 'Your Order has been Placed',
            3 => 'Order Success',
            4 => 'Your order will be pick up by our courier company from our facility',
            5 => 'Your order is on the way to your Delivery address.',
            6 => 'Delivered',
            7 => 'We got your return request. Our team is processing your request.',
            8 => 'Your order has been cancelled. Kindly contact us for more detail.',
        ];

        if($id) {
            return $status[$id];
        }
        
        return $status;
    }

    public static function orderMessages($id, $orderId)
    {
        $messages = [
            3 => "Thanks for shopping at SHROUD. Your ORDER ID $orderId. Kindly visit SHROUD.IN for more detail.",
            4 => "Your oreder picked up from our facility. Your ORDER ID $orderId . Kindly visit SHROUD.IN for more detail.",
            5 => "Your order is on the way for delivery. Your ORDER ID $orderId. Kindly visit SHROUD.IN for more detail.",
            6 => "Your order has been delivered. Your ORDER ID $orderId. Kindly visit SHROUD.IN for more detail.",
            7 => "We got your return request. Sub order ID $orderId. Our team is processing your request. Kindly visit SHROUD.IN for more detail",
            8 => "Your order has been cancelled Kindly visit SHROUD.IN for more detail.",
        ];

        if($id) {
            return $messages[$id];
        }
        
        return $messages;
    }

    public static function dateFormat($date)
    {
        return date("d/m/Y", strtotime($date));
    }

    public static function paymentMode($id = null)
    {
        $status = [
            101 => 'Credit Card',
            2 => 'Debit Card',
            3 => 'Net Banking',
            107 => 'UPI',
            1 => 'COD',
        ];

        if($id) {
            return $status[$id];
        }
        
        return $status;
    }

    public static function orderReason($id = null)
    {
        $reason = [
            1 => 'Damage',
            2 => 'Size Issue',
            3 => 'Other Resion',
        ];

        if($id) {
            return $reason[$id];
        }
        
        return $reason;
    }
}
