<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\ThanksYou;
use Illuminate\Support\Facades\Notification;

class ThanksYouController extends Controller
{
    public function sendThanksyou()
    {
        $user = User::First();

        $thanksyou = [
            'body' => 'Test1',
            'text' => 'Click me',
            'url'=> url('/'),
            'thankyou' => 'Test2'
        ];

        Notification::send($user, new ThanksYou($thanksyou));
    }
}
