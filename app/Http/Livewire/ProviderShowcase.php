<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Livewire\Component;

class ProviderShowcase extends Component
{
    public function mount()
    {
        $this->profiles = Profile::with('user')->get();
    }

    public function render()
    {
        return view('livewire.provider-showcase')->extends('welcome');
    }
}
