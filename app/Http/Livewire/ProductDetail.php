<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Review;
use Livewire\Component;

class ProductDetail extends Component
{


    public $review = '';
    public $starRate = 4;

    protected $rules = [
        'review' => ['required', 'min:25', 'max:400'],
        'starRate' => ['required']
    ];

    public function mount(Profile $profile)
    {
        $this->profile = $profile->load('user', 'photos', 'reviews');
        $this->getReviews();
    }

    public function getReviews(){
        $total_users_rated = $this->profile->reviews->count();
        $sum_of_max_rating_of_user_count = $total_users_rated * 5;
        $sum_of_rating = $this->profile->reviews->sum('star_rate');
        if (in_array($sum_of_max_rating_of_user_count, [0]) || in_array($sum_of_rating, [0])) {
            $this->overallRate = 0;
        } else {
            $this->overallRate = $sum_of_rating * 5 / $sum_of_max_rating_of_user_count;
        }
    }

    public function chat()
    {
        if (!auth()->check()) {
            return to_route('login');
        }
        return to_route('chat.view', $this->profile->id);
    }

    public function submitReview()
    {

        if (!auth()->check()) {
            return to_route('login');
        }

        $this->validate();

        if (!Project::where('provider_id', $this->profile->user_id)->where('consumer_id', auth()->id())->exists()) {
            $this->dispatchBrowserEvent('cantAddReview');
            return;
        }
        Review::create([
            'profile_id' => $this->profile->id,
            'consumer_id' => auth()->id(),
            'review' => $this->review,
            'star_rate' => $this->starRate
        ]);

        $this->reset('starRate','review');
        $this->dispatchBrowserEvent('addedReview');
        $this->mount($this->profile);
    }

    public function render()
    {

        return view('livewire.product-detail')->extends('welcome');
    }
}
