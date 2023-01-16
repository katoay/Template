<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MasterData\Tableline;
use App\Http\Livewire\MasterData\Announcement;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('tableline', Tableline::class)->middleware('auth')->name('tableline');
    Route::get('announcement', Announcement::class)->middleware('auth')->name('announcement');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
