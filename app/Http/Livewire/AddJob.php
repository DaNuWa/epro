<?php

namespace App\Http\Livewire;

use App\Events\JobStatusUpdatedEvent;
use App\Models\Profile;
use App\Models\Project;
use Livewire\Component;

class AddJob extends Component
{
    public $description = '';

    public $hours = 1;

    public $rate;

    public $success = false;

    public $loader=false;

    protected $rules=['description'=>['required','min:25','max:100']];


    protected $listeners = ['transactionSuccess'];

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
        $this->rate = $this->hours * $profile->rate;
    }

    public function updatedHours($val)
    {
        if($val==null){
            $this->hours=1;
        }
        $this->calculateRate();
    }

    public function calculateRate()
    {
        $this->rate = $this->hours * $this->profile->rate;
        $this->dispatchBrowserEvent('rate-updated', ['newRate' => $this->rate, 'addButton' => false]);
    }

    public function handlePayment()
    {
        if (!auth()->check()) {
            return to_route('login');
        }
        $this->validate();
        $this->dispatchBrowserEvent('rate-updated', ['newRate' => $this->rate, 'addButton' => true]);
    }

    public function transactionSuccess($event)
    {

        $this->loader=true;
        $project=Project::create([
            'transaction_id' => $event['id'],
            'provider_id' => $this->profile->user_id,
            'consumer_id' => auth()->id(),
            'description' => $this->description,
            'status' => 'pending',
            'hours' => $this->hours,
            'amount' => $this->rate,
        ]);
        $this->reset('hours','description');
        $this->calculateRate();
        event(new JobStatusUpdatedEvent($project));
        $this->success = true;
        $this->dispatchBrowserEvent('hideLoader');



    }

    public function render()
    {
        return view('livewire.add-job');
    }
}
