<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chat extends Component
{


    public function getListeners()
    {
        return [
            "echo-private:chat.1.2,ChatEvent" => 'updateChat',
        ];
    }

  
    public function notifyNewOrder($event)
    {
        dd($event);
    }
    public function updateChat($event)
    {
        dd($event);
    }

    public function render()
    {
        return view('livewire.chat')->extends('welcome');
    }
}
