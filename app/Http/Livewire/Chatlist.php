<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Chatlist extends Component
{
    protected $listeners=['updateNewUser'];
    public function mount(User $user)
    {
        $this->user=$user;
      
    }

    public function updateNewUser( )
    {dd(555);
        
        $this->user = $user;
        $this->getListeners();
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

        if($id>0){
            return [
                "echo:$this->channel,ChatEvent" => 'updateChat',
            ];
        }
       
    }


    public function getChats()
    {
        $this->chats = \App\Models\Chat::where(function ($q) {
            $q->where('sender_id', auth()->id())
                ->orWhere('sender_id',$this->user['id']);
        })->where(function ($q) {
            $q->where('receiver_id', auth()->id())
                ->orWhere('receiver_id', $this->user['id']);
        })->get();
    }

    public function render()
    {
        $this->getChats();
        return view('livewire.chatlist');
    }
}