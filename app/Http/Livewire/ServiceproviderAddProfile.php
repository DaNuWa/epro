<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Profile;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServiceproviderAddProfile extends Component
{
    use WithFileUploads;

    public $title = '';

    public $description = '';

    public $rate = 0;

    public $images = [];

    public $selectedCategories = [];

    public function addProfile()
    {
        $this->validate([
            'images.*' => ['required', 'image', 'max:10000'],
            'images' => ['required', 'array'],
            'title' => ['required'],
            'description' => ['required', 'min:10', 'max:500'],
            'rate' => ['required', 'min:1'],
            'selectedCategories' => ['required', 'array'],
        ]);

        $profile = Profile::create([
            'user_id' => auth()->id(),
            'description' => $this->description,
            'title' => $this->title,
            'rate' => $this->rate,
        ]);

        $profile->categories()->attach($this->selectedCategories);

        collect($this->images)->each(fn ($image) => $profile->addMedia($image->getRealPath())->toMediaCollection('projectimages')
        );

        return to_route('profile.view', $profile);
    }

    public function render()
    {
        $this->categories = Category::get();

        return view('livewire.serviceprovider-add-profile')->extends('dashboard');
    }
}
