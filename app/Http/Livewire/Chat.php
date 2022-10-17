<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chat extends Component
{


    // public function getListeners()
    // {
    //     return [
    //         "echo-private:chat.1.2,ChatEvent" => 'updateChat',
    //     ];
    // }

    // protected $listeners = [ "echo:chat.1.2,ChatEvent" => 'updateChat'];
    // protected $listeners = ['echo:chat,ChatEvent' => 'updateChat'];

    // protected $listeners = ['echo:orders,.OrderShipped' => 'notifyNewOrder'];

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
