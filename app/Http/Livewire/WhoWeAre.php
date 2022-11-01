<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WhoWeAre extends Component
{
    public function render()
    {
        return view('livewire.who-we-are')->extends('welcome');
    }
}
