<?php

use App\Events\ChatEvent;
use App\Events\OrderShipped;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Livewire\Chat;
use App\Http\Livewire\ProductDetail;
use App\Http\Livewire\ProviderShowcase;
use App\Http\Livewire\ServiceproviderAddProfile;
use App\Http\Livewire\ServiceProviderChat;
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
})->name('home');


Route::get('serviceprovider/register',[RegisteredUserController::class,'serviceProviderCreate'])->name('serviceprovider.register');
Route::post('serviceprovider/regitser',[RegisteredUserController::class,'serviceProviderregister'])->name('serviceprovider.register.post');

Route::get('/', ProviderShowcase::class)->name('home');
Route::get('/profile/{profile}', ProductDetail::class)->name('profile.view');
Route::get('/chat/{profile}', Chat::class)->name('chat.view');

Route::group(['prefix'=>'serviceprovider','middleware' => ['auth:web', 'serviceprovider']], function() {
Route::get('/user', ServiceproviderAddProfile::class)->name('serviceprovider.add.profile');
Route::get('/chat', ServiceProviderChat::class)->name('serviceprovider.chat.view');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
