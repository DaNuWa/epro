<?php

namespace App\Http\Livewire;

use App\Models\Card;
use Livewire\Component;

class ProfileInfo extends Component
{
    public $payment_info;
    public $holder_name;
    public $bank_name;
    public $branch_name;
    public $branch_code;
    public $account_number;

    protected $rules=[
        'holder_name'=>['required','max:25'],
        'bank_name'=>['required','max:15'],
        'branch_name'=>['required',"max:15"],
        'branch_code'=>['required','min:5','max:15'],
        'account_number'=>['required','min:5','max:15'],
    ];


    public function mount(){
        $this->payment_info=Card::where('user_id',auth()->id())->first();
        $this->holder_name=$this->payment_info->holder_name;
        $this->bank_name=$this->payment_info->bank_name;
        $this->branch_name=$this->payment_info->branch_name;
        $this->branch_code=$this->payment_info->branch_code;
        $this->account_number=$this->payment_info->account_number;
    }

    public function render()
    {
        return view('livewire.profile-info')->extends('dashboard');
    }

    public function updateCard(){
        $this->validate();

        $this->payment_info->holder_name=$this->holder_name;
        $this->payment_info->bank_name=$this->bank_name;
        $this->payment_info->branch_name=$this->branch_name;
        $this->payment_info->branch_code=$this->branch_code;
        $this->payment_info->account_number=$this->account_number;

        $this->payment_info->save();

        $this->dispatchBrowserEvent('cardUpdated');


    }
}
