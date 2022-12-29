<?php

namespace App\Listeners;

use App\Events\postCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\userMail;
use App\Models\User;

class notifyUser
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
     * @param  \App\Events\postCreated  $event
     * @return void
     */
    public function handle(postCreated $event)
    {
        $users=User::get();
        foreach($users as $user) {
            \Mail::to($user->email)->send(new userMail($event->post));
        }
    }
}
