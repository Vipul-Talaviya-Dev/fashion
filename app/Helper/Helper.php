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
}
