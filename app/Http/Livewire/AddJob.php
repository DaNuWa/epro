<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use App\Models\Project;
use Livewire\Component;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Http\Request;



class AddJob extends Component
{

    public $description = '';
    public $hours = 1;
    public $rate;
    public $success=false;



    protected $listeners=['transactionSuccess'];

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
        $this->rate = $this->hours * $profile->rate;

    }

    public function updatedHours($val)
    {
        $this->calculateRate();
    }

    public function calculateRate()
    {
        $this->rate = $this->hours * $this->profile->rate;
        $this->dispatchBrowserEvent('rate-updated', ['newRate' => $this->rate,'addButton'=>false]);
    }

    public function handlePayment(){
        $this->dispatchBrowserEvent('rate-updated', ['newRate' => $this->rate,'addButton'=>true]);
    }
    public function transactionSuccess($event){
        $this->success=true;
        Project::create(['transaction_id'=>$event['id'],
        'provider_id'=>$this->profile->user_id,
        'consumer_id'=>auth()->id(),
        'description'=>$this->description,
        'hours'=>$this->hours,
        'amount'=>$this->rate
    ]);
    }

    public function render()
    {
        return view('livewire.add-job');
    }
}
