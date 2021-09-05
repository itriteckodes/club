<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function send(Request $request){
        foreach (User::where('notification',true)->get() as $user) {
            NotificationHelper::send(
                (object) [
                    'title' => $request->title,
                    'body' => $request->body,
                    'firebase_token' => $user->firebase_token
                ]
            );

        }

        return redirect()->back();
    }
}
