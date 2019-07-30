<?php

namespace App\Helper;

use GuzzleHttp\Client;

class Sms
{
    public static function send($to, $message)
    {
        $authKey = "281230AgqvMwvw5d05f39c";
        $senderId = "SHROUD";
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
