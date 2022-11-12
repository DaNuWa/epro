<?php

namespace App\Listeners;

use App\Events\JobStatusUpdatedEvent;
use App\Mail\ProjectStatusUpdatedMail;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendConsumerJobStatusUpdate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(public Project $project)
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
        $user=User::find($event->project->consumer_id);
        Mail::to($user)->send(new ProjectStatusUpdatedMail($event->project));
    }
}
