<?php

namespace App\Listeners;

use App\Events\SendMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailFaired
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendMail $event): void
    {
        $users=User::get();
        foreach ($users as $user) {
            Mail::send('mailer.mail',['user' => $user],function($mesage) use($user){
                $mesage->to($user['email']);
                $mesage->subject('event');
            });
        }
    }
}
