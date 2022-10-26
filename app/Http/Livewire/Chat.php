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

    protected $listeners = ['updateNewUser' => 'updateChatUser'];

    public function mount(Profile $profile)
    {
        $this->profile = $profile;

        if(auth()->user()->is_provider){
            return to_route('serviceprovider.chat.view');
        }

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
            'receiver_id' => $this->profile->user->id,
            'message' => $this->message,
        ]);

        event(new ChatEvent($this->message, auth()->id(), $this->profile->user->id));
        $this->message = '';
    }

    public function gotMessages()
    {
        $chat_user_ids = \App\Models\Chat::SentMessages()->pluck('receiver_id')->toArray();
        $this->chatusers = User::whereIn('id', $chat_user_ids)->get();
    }

    public function render()
    {
        $this->gotMessages();
        // $this->getChats();
        return view('livewire.chat')->extends('welcome');
    }
}
