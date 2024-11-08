<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class SendWelcomeEmail implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(UserRegistered $event)
{
    Mail::to($event->user->email)->send(new WelcomeEmail($event->user));
}

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        //
    }
}
