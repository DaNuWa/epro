<?php

namespace App\Http\Livewire;

use App\Events\ChatEvent;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServiceProviderChat extends Component
{
    use WithFileUploads;

    public $message = '';
    public $file;

    public $chatusers = [];

    public $channel = '';

    public $user;

    protected $listeners = ['updateNewUser' => 'updateChatUser'];

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



        if ($this->file) {

            //upload the file

            $dir=auth()->id()>$this->user['id']?auth()->id()."-".  $this->user['id']:  $this->user['id']."-".auth()->id();

           $path= $this->file->store($dir);
           

            \App\Models\Chat::create([
                'sender_id' => auth()->id(),
                'receiver_id' =>  $this->user['id'],
                'message' => $path,
                'type'=>'file'
            ]);
        } else {

            if($this->message=='') return; 

            \App\Models\Chat::create([
                'sender_id' => auth()->id(),
                'receiver_id' =>  $this->user['id'],
                'message' => $this->message,
            ]);
        }

        event(new ChatEvent($this->message, auth()->id(), $this->user['id']));
        $this->message = '';
        $this->reset('file');
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
