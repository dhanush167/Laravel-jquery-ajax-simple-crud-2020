<?php

namespace App\Listeners;

use App\Events\ChangePasswordEvent;

class ChangePasswordListener
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
    public function handle(ChangePasswordEvent $event)
    {
        $name = $event->user->name;
        $email = $event->user->email;

        //Send email
    }
}
