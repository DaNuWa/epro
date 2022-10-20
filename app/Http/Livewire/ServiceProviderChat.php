<?php

namespace App\Http\Livewire;

use App\Events\ChatEvent;
use App\Models\User;
use Livewire\Component;

class ServiceProviderChat extends Component
{


    public $message = '';
    public $chatusers = [];
    public $channel = '';
    public $user;

    protected $listeners=['updateNewUser'=>'updateChatUser'];

    public function mount()
    {

        $this->user = new User();
    }


    public function updateChat($event)
    {
        $this->render();
    }

    public function updateChatUser($user)
    {
      
        $this->user = $user;
    }

    public function sendMessage()
    {
        \App\Models\Chat::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $this->user['id'],
            'message' => $this->message
        ]);

        event(new ChatEvent($this->message, auth()->id(), $this->user['id']));
        $this->message = '';
    }





    public function gotMessages()
    {

        $chat_user_ids = \App\Models\Chat::RecievedMessages()->pluck('sender_id')->toArray();
        $this->chatusers = User::whereIn('id', $chat_user_ids)->get();
    }




    public function render()
    {
        $this->gotMessages();
        return view('livewire.service-provider-chat')->extends('dashboard');
    }
}
