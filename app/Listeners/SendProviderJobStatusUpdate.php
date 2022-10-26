<?php

namespace App\Listeners;

use App\Events\JobStatusUpdatedEvent;
use App\Mail\ProjectStatusUpdatedMail;
use App\Models\User;
use Database\Seeders\ProjectTableSeeder;
use Illuminate\Support\Facades\Mail;

class SendProviderJobStatusUpdate
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
     * @param  \App\Events\JobStatusUpdatedEvent  $event
     * @return void
     */
    public function handle(JobStatusUpdatedEvent $event)
    {
        $user=User::find($event->project->provider_id);
        Mail::to($user)->send(new ProjectStatusUpdatedMail($event->project));

    }
}
