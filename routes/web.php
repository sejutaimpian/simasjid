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

Route::middleware('auth')->group(function () {
    Route::get('/logout', function () {
        Session::flush();
        Auth::logout();
        return redirect('login');
    });
    Volt::route('/dashboard', 'dashboard.dashboard')->name('dashboard');
    Volt::route('/dashboard/artikel', 'dashboard.artikel')->name('dashboard-artikel');
    Volt::route('/dashboard/artikel/create', 'dashboard.artikel-buat')->name('artikelBuat');
    Volt::route('/dashboard/artikel/edit/{slug}', 'dashboard.artikel-edit')->name('artikelEdit');
    Volt::route('/dashboard/ustaz', 'dashboard.ustaz')->name('dashboard-ustaz');
    Volt::route('/dashboard/ustaz/create', 'dashboard.ustaz-buat')->name('ustazBuat');
    Volt::route('/dashboard/ustaz/edit/{id}', 'dashboard.ustaz-edit')->name('ustazEdit');
    Volt::route('/dashboard/dkm', 'dashboard.dkm')->name('dashboard-dkm');
    Volt::route('/dashboard/dkm/create', 'dashboard.dkm-buat')->name('dkmBuat');
    Volt::route('/dashboard/dkm/edit/{id}', 'dashboard.dkm-edit')->name('dkmEdit');
    Volt::route('/dashboard/agenda', 'dashboard.agenda')->name('dashboard-agenda');
    Volt::route('/dashboard/agenda/create', 'dashboard.agenda-buat')->name('agendaBuat');
    Volt::route('/dashboard/agenda/edit/{id}', 'dashboard.agenda-edit')->name('agendaEdit');
});

require __DIR__ . '/auth.php';
