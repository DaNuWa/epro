<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Livewire\Component;

class Listofchatusers extends Component
{

    public function mount($chatusers){
        $this->chatusers=$chatusers;
    }

    public function updateChatUser($user)
    {
        Chat::where(function ($q) use($user){
            $q->where('sender_id', $user['id'])
                ->where('receiver_id',auth()->id());
        })->update(['is_read'=>true]);

        $this->emit('updateNewUser',$user);
      
    }



    public function render()
    {
        return view('livewire.listofchatusers');
    }
}
