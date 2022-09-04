<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\Newsletter;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserWasRegistered;
use App\Notifications\NewUser;


class NewUserWasRegistered
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle( UserWasRegistered  $event) : void
    {
        $admin = User::where( 'is_admin', 1 )->first(); //use + dokladnie taki sam plik widziales wczoraj :P 
        $admin->notify( new NewUser($event->NewUser->name, $event->NewUser->phone ) );
    }
}
