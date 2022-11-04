<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectDetails extends Component
{


    public function viewChat($provider_id, $consumer_id)
    {
        return to_route('admin.chat', [$provider_id, $consumer_id]);
    }

    public function render()
    {
        $this->projects = Project::with('consumer', 'provider')->get();
        return view('livewire.project-details')->extends('super-admin-dashboard');
    }
}
