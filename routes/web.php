<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'home')->name('home');

Volt::route('/agenda', 'agenda')->name('agenda');
Volt::route('/artikel', 'article')->name('artikel');
Volt::route('/artikel/{slug}', 'article-detail')->name('artikelDetail');
Volt::route('/ustaz', 'ustaz')->name('ustaz');
Volt::route('/dkm', 'dkm')->name('dkm');
Volt::route('/kas', 'kas')->name('kas');
Volt::route('/dev', 'dev')->name('dev');


// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('dashboard/profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', function () {
        Session::flush();
        Auth::logout();
        return redirect('login');
    });
    Volt::route('/dashboard', 'disdev')->name('dashboard');
});

require __DIR__ . '/auth.php';
