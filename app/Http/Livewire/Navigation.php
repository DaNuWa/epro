<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navigation extends Component
{

    public function regiserAsServiceProvider()
    {
        return to_route('serviceprovider.register');
    }


    

    public function signin()
    {
        return to_route('login');
    }


    public function logout()
    {
        Auth::guard('web')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
