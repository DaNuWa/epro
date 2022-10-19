<?php

namespace App\Http\Livewire;

use App\Events\ChatEvent;
use App\Models\User;
use Livewire\Component;

class ServiceProviderChat extends Component
{


    public $message = '';
    public $chatusers=[];
    public $channel='';

    public function mount()
    {

        $this->user = new User();
    }

    public function getListeners()
    {
        $id=$this->user['id']??0;
        $auth_id=auth()->id();

        if(auth()->id()>  $id){
            $this->channel = "chat.$auth_id.$id";

        }else{
            $this->channel = "chat.$id.$auth_id";

        }

        return [
            "echo: $this->channel,ChatEvent" => 'updateChat',
        ];
    }



    public function updateChat($event)
    {dd(55);
        $this->render();
    }

    public function updateChatUser($user){
        $this->user=$user;
        $this->getListeners();
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

    public function getChats()
    {
        $this->chats = \App\Models\Chat::where(function ($q) {
            $q->where('sender_id', auth()->id())
                ->orWhere('sender_id', $this->user['id']);
        })->where(function ($q) {
            $q->where('receiver_id', auth()->id())
                ->orWhere('receiver_id', $this->user['id']);
        })->get();
    }


    
    public function gotMessages()
    {

        $chat_user_ids=\App\Models\Chat::RecievedMessages()->pluck('sender_id')->toArray();
        $this->chatusers = User::whereIn('id',$chat_user_ids)->get();
    }

    


    public function render()
    {
        $this->getChats();
        $this->gotMessages();
        return view('livewire.service-provider-chat')->extends('dashboard');
    }
}
