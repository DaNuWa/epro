<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Livewire\Component;
use Livewire\WithPagination;

class ProviderShowcase extends Component
{
    use WithPagination;


    protected $listeners=['filterProfiles'];
    protected $paginationTheme = 'bootstrap';

    public $profile_ids=[];

    public function mount()
    {
        $this->profiles = Profile::with('user')->withCount('reviews')->get();
    }
   

    public function filterProviders($category_id)
    {
       $this->profiles=Profile::whereHas('categories', function($q) use($category_id)
       {
           $q->where('category_id', '=', $category_id);
       
       })
       ->with('user')->withCount('reviews')->get();
    }

    public function filterProfiles($term)
    {
        if($term==''){
            $this->profiles = Profile::with('user')
            ->withCount('reviews')->get();
        }else{
            $this->profiles=Profile::where('title','like',"%$term%")
            ->with('user')->withCount('reviews')->get();
        }
    }

    public function sortPrice($type)
    {
       if($type=='max'){
        $this->profiles =$this->profiles->sortByDesc('rate');
       }else{
        $this->profiles=$this->profiles->sortBy('rate');
       }
    }

    public function sortByReviews()
    {
        $this->profiles=Profile::with('user')
        ->whereIn('id',$this->profile_ids)
        ->withCount('reviews')->get()
        ->sortByDesc('reviews_count');
    }

    public function render()
    {
        $this->profile_ids=$this->profiles->pluck('id')->toArray();
        return view('livewire.provider-showcase',['profiles'=>$this->profiles])->extends('welcome');
    }
}
