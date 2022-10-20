<?php

namespace App\Http\Livewire;

use App\Events\ChatEvent;
use App\Models\Profile;
use App\Models\User;
use Livewire\Component;

class Chat extends Component
{


    public $message = '';
    public $chatusers = [];
    public $channel = '';
    public $user;

    protected $listeners=['updateNewUser'=>'updateChatUser'];

    public function mount(Profile $profile)
    {

        $this->profile = $profile;

        $this->user = new User();
    }

    
    public function getListeners()
    {

        $id=$this->profile->user->id??0;
        $auth_id=auth()->id();

        if(auth()->id()>  $id){
            $this->channel = "chat.$auth_id.$id";

        }else{
            $this->channel = "chat.$id.$auth_id";

        }

            return [
                "echo:$this->channel,ChatEvent" => 'updateChat',
            ];
        
       
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
            'receiver_id' => $this->profile->user->id,
            'message' => $this->message
        ]);

        event(new ChatEvent($this->message, auth()->id(), $this->profile->user->id));
        $this->message = '';
    }
    





    public function gotMessages()
    {

        $chat_user_ids = \App\Models\Chat::RecievedMessages()->pluck('sender_id')->toArray();
        $this->chatusers = User::whereIn('id', $chat_user_ids)->get();
    }

    public function getChats()
    {
        $this->chats = \App\Models\Chat::where(function ($q) {
            $q->where('sender_id', auth()->id())
                ->orWhere('sender_id', $this->profile->user->id);
        })->where(function ($q) {
            $q->where('receiver_id', auth()->id())
                ->orWhere('receiver_id', $this->profile->user->id);
        })->get();
    }

    public function render()
    {
        $this->gotMessages();
        $this->getChats();
        return view('livewire.chat')->extends('welcome');
    }


}
