<?php

namespace App\Helper;

class Helper
{
    public static function orderStatus($id = null)
    {
        $status = [
            1 => 'Order Checkout',
            2 => 'Order Placed',
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
