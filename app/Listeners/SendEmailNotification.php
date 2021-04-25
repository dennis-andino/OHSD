<?php

namespace App\Listeners;

use App\Events\CommentWasCreated;
use App\Mail\CommentNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class SendEmailNotification
{


    /**
     * Handle the event.
     *
     * @param  CommentWasCreated  $event
     * @return void
     */
    public function handle(CommentWasCreated $event)
    {
     //dd($event->comment); //permite observar los datos recibidos
        Mail::to($event->comment)->queue(
            new CommentNotification($event->comment,$event->body)
        );
    }
}
