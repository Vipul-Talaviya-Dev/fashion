<?php

namespace App\Library;

use GuzzleHttp\Client;

class Sms
{
    public static function send($to, $message)
    {
        $authKey = "171105As1YFY1XiUmg599c07f4";
        $senderId = "CEREBR";
        $route = 4;

        (new Client)->post('https://control.msg91.com/api/sendhttp.php', [
            'form_params' => [
                'authkey' => $authKey,
                'mobiles' => $to,
                'message' => $message,
                'sender' => $senderId,
                'route' => $route
            ]
        ]);

        return true;
    }
}
