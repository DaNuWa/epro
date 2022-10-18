<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Livewire\Component;

class Chat extends Component
{


    public function mount(Profile $profile){

        $this->profile=$profile;
    }

    public function getListeners()
    {

        $channel='chat.'.auth()->id().'.'.$this->profile->user->id;
        return [
            "echo: $channel,ChatEvent" => 'updateChat',
        ];
    }

  
    public function updateChat($event)
    {
        $this->render();
    }

    public function render()
    {
        $this->getChats();
        return view('livewire.chat')->extends('welcome');
    }

    public function getChats(){
        $this->chats=\App\Models\Chat::where(function($q){
            $q->where('sender_id',auth()->id())
            ->orWhere('sender_id',$this->profile->user->id);
        }) ->where(function($q){
            $q->where('receiver_id',auth()->id())
            ->orWhere('receiver_id',$this->profile->user->id);
        })->get();
    }
}
