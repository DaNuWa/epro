<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Settings extends Component
{

    public $password;
    public $old_password;
    public $new_password;


    public function mount($view='dashboard'){
        $this->view=$view;
    }

    protected $rules=[
        'old_password' => ['required'],
        'password' => ['required','min:8','max:12'],
        'new_password' => ['same:password'   ]
    ];

    public function updatePassword(){
        $this->validate();

        if(Hash::check($this->old_password,auth()->user()->password)){
            auth()->user()->update(['password'=>Hash::make($this->password)]);
            $this->dispatchBrowserEvent('passwordUpdated');
            return ;
        }
        $this->addError('password', 'Old password is incorrect');

        return ;
    }

    public function render()
    {
        return view('livewire.settings')->extends($this->view);
    }
}
