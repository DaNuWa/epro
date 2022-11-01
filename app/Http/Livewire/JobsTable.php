<?php

namespace App\Http\Livewire;

use App\Events\JobStatusUpdatedEvent;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class JobsTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    protected $allJobs = [];

    public function markAsCompleted(Project $project)
    {
        $project->update(['status' => 'complete']);
        //send email
        event(new JobStatusUpdatedEvent($project));
        $this->render();


    }
    public function markAsStarted(Project $project)
    {
        $project->update(['status' => 'in-progress','started_at'=>now()]);
        //send email
        event(new JobStatusUpdatedEvent($project));
        $this->render();


    }
    public function markAsRejected(Project $project)
    {
        $project->update(['status' => 'reject','rejected_at'=>now()]);
        //send email
        event(new JobStatusUpdatedEvent($project));
        $this->render();

    }
    

    public function render()
    {
        if(auth()->user()->is_provider)
        $this->allJobs = Project::where('provider_id', auth()->id())
        ->latest()
        ->paginate(5);
        else{
            $this->allJobs = Project::where('consumer_id', auth()->id())
            ->latest()
            ->paginate(5); 
        }

        return view('livewire.jobs-table', ['allJobs' => $this->allJobs])->extends('dashboard');
    }
}
