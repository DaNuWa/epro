<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Livewire\Component;

class ProductDetail extends Component
{


    public function mount(Profile $profile)
    {

        $this->profile = $profile->load('user', 'photos', 'reviews');

        $total_users_rated = $this->profile->reviews->count();
        $sum_of_max_rating_of_user_count = $total_users_rated * 5;
        $sum_of_rating = $this->profile->reviews->sum('star_rate');
        if (in_array($sum_of_max_rating_of_user_count, [0]) || in_array($sum_of_rating, [0])) {
            $this->overallRate = 0;
        } else {
            $this->overallRate = $sum_of_rating * 5 / $sum_of_max_rating_of_user_count;
        }
    }

    public function chat(){
        return to_route('chat.view',$this->profile->id);
    }

    public function render()
    {
        return view('livewire.product-detail')->extends('welcome');
    }
}
