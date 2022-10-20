<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Livewire\Component;

class Chatuser extends Component
{

    public $isRead;
    public $lastChat;
    public function mount($chatuser)
    {
        $this->chatuser = $chatuser;
        $this->lastChat = Chat::where(function ($q) {
            $q->where('sender_id', auth()->id())
                ->orWhere('sender_id', $this->chatuser['id']);
        })->where(function ($q) {
            $q->where('receiver_id', auth()->id())
                ->orWhere('receiver_id', $this->chatuser['id']);
        })->latest()->first();

        $this->isRead=$this->lastChat->is_read;

        $this->lastMessage=$this->lastChat->message ?? '';
    }

    public function getListeners()
    {
        $id = $this->chatuser['id'] ?? 0;
        $auth_id = auth()->id();

        if (auth()->id() >  $id) {
            $this->channel = "chat.$auth_id.$id";
        } else {
            $this->channel = "chat.$id.$auth_id";
        }

        if ($id > 0) {
            return [
                "echo:$this->channel,ChatEvent" => 'updateLastMessage',
            ];
        }
    }

    public function updateLastMessage($event)
    {
        if($event['sender_id']!==auth()->id()){
            $this->isRead=false;
        }
        $this->lastMessage = $event['message'];
    }

    public function render()
    {
        return view('livewire.chatuser');
    }
}
