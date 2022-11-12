<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Livewire\AdminChat;
use App\Http\Livewire\Chat;
use App\Http\Livewire\Conditions;
use App\Http\Livewire\Faq;
use App\Http\Livewire\JobsTable;
use App\Http\Livewire\Privacy;
use App\Http\Livewire\ProductDetail;
use App\Http\Livewire\ProfileInfo;
use App\Http\Livewire\ProjectDetails;
use App\Http\Livewire\ProviderShowcase;
use App\Http\Livewire\ServiceproviderAddProfile;
use App\Http\Livewire\ServiceProviderChat;
use App\Http\Livewire\Settings;
use App\Http\Livewire\WhoWeAre;
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


Route::get('serviceprovider/register', [RegisteredUserController::class, 'serviceProviderCreate'])->name('serviceprovider.register');
Route::post('serviceprovider/regitser', [RegisteredUserController::class, 'serviceProviderregister'])->name('serviceprovider.register.post');

Route::get('/', ProviderShowcase::class)->name('home');
Route::get('/profile/{profile}', ProductDetail::class)->name('profile.view');
Route::get('/chat/{profile}', Chat::class)->name('chat.view');
Route::get('/faq', Faq::class)->name('faq.view');
Route::get('/who-we-are', WhoWeAre::class)->name('who.view');
Route::get('/policies', Privacy::class)->name('privacy.view');
Route::get('/terms-and-condition', Conditions::class)->name('conditions.view');

Route::get('/settings', Settings::class)->name('settings.view');


Route::group(['prefix' => 'serviceprovider', 'middleware' => ['auth:web']], function () {
    Route::get('/user', ServiceproviderAddProfile::class)->name('serviceprovider.add.profile');
    Route::get('/chat', ServiceProviderChat::class)->name('serviceprovider.chat.view');
    Route::get('/jobs', JobsTable::class)->name('serviceprovider.jobs.view');
    Route::get('/about', ProfileInfo::class)->name('serviceprovider.about.view');
});

Route::get('admin-simple', ProjectDetails::class)->name('admin.home');
Route::get('adminChat/{consumer_id}/{provider_id}', AdminChat::class)->name('admin.chat');
Route::get('admin-logout', function () {
    Auth::logout();
    return to_route('login');
})->name('admin.logout');


Route::get('/dashboard', function () {
    return view('super-admin-dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
