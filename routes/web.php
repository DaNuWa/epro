<?php

use App\Events\ChatEvent;
use App\Events\OrderShipped;
use App\Http\Livewire\Chat;
use App\Http\Livewire\ProductDetail;
use App\Http\Livewire\ProviderShowcase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', ProviderShowcase::class);
Route::get('/profile/{profile}', ProductDetail::class)->name('profile.view');
Route::get('/chat/{profile}', Chat::class)->name('chat.view');
Route::get('/user', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
