<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NotificationHelper
{

    public static function send($object)
    {
        $notification['to'] = $object->firebase_token;
        $notification['notification']['click_action'] = "FLUTTER_NOTIFICATION_CLICK";
        $notification['notification']['title'] = $object->title;
        $notification['notification']['body'] = $object->body;
        
        $result = Http::withOptions(['json' => $notification])
            ->withHeaders(["authorization" => "key= AAAACD33jxg:APA91bF7oMcDQzQFOKjsJLLOvuBaXkyjZLp6H2UI6ydiSp1QANqwRmoSXEgn-BAuCienmcnrSr_84-3MOXBbtbbXOvRsVYbjsnqbmoUVCqVgE1Ljq98ZDWNCWgGtbZSpfx-QMl_nfUgY"])
            ->post("https://fcm.googleapis.com/fcm/send");

    }

}