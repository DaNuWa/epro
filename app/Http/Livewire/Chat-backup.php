<?php

namespace App\Http\Livewire;

use App\Events\ChatEvent;
use App\Models\Profile;
use Livewire\Component;

class Chat extends Component
{
    public $message = '';

    public $channel = '';

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function getListeners()
    {
        $id = $this->profile->user->id ?? 0;
        $auth_id = auth()->id();

        if (auth()->id() > $id) {
            $this->channel = "chat.$auth_id.$id";
        } else {
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

    public function render()
    {
        $this->getChats();

        return view('livewire.chat')->extends('welcome');
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
}
