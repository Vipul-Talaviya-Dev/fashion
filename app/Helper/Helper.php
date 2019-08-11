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

    public static function getIndianCurrency(float $number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
        $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
        while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 'S' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? ucfirst($words[$number]).' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
    }
}
