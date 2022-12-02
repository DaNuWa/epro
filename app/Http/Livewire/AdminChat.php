<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\User;
use Livewire\Component;

class AdminChat extends Component
{
    public $provider;public $consumer;

    public function mount($consumer_id,$provider_id)
    {
        $this->consumer = User::find($consumer_id);
        $this->provider = User::find($provider_id);
        if(Chat::where(function($query) use($provider_id,$consumer_id){
            $query->where('receiver_id',$consumer_id)
            ->where('sender_id',$provider_id);
        })->orWhere(function($query) use($provider_id,$consumer_id){
            $query->where('receiver_id',$provider_id)
            ->where('sender_id',$consumer_id);
        })->exists()){
            $this->consumer = User::find($consumer_id);
            $this->provider = User::find($provider_id);
        }else{
            if(!auth()->user()->is_superadmin){
                abort(403,'Unauthorized Action');
            }
        }
       
    }

    public function getListeners()
    {
        

        if ($this->consumer->id > $this->provider->id) {
            $this->channel = "chat.$this->consumer->id.$this->provider->id";
        } else {
            $this->channel = "chat.$this->provider->id.$this->consumer->id";
        }

            return [
                "echo:$this->channel,ChatEvent" => 'render',
            ];
        
    }

    public function getChats()
    {
        $this->chats = \App\Models\Chat::where(function ($q) {
            $q->where('sender_id', $this->consumer->id)
                ->where('receiver_id', $this->provider->id);
        })->orWhere(function ($q) {
            $q->where('receiver_id',$this->consumer->id)
                ->where('sender_id', $this->provider->id);
        })->get();
    }

  



    public function render()
    {
        $this->getChats();
        return view('livewire.admin-chat')->extends('super-admin-dashboard');
    }
}
