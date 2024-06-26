<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
//    return redirect('/login');
});

Route::get('/dashboard', function () {
    return redirect('/events');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/events')->group(function () {
    Route::get('/concepts', [EventController::class, 'conceptindex'])->name('events.concepts');
    Route::get('/export', [EventController::class, 'exportevents'])->name('events.export');
    Route::get('/registrations', [EventController::class, 'registrations'])->name('events.registrations');
    Route::get('/{id}/export', [EventController::class, 'exportsignups'])->name('event.export');
    Route::post('/{id}/signup', [EventController::class, 'signup'])->name('event.signup');
    Route::get('/{id}/signups', [EventController::class, 'signups'])->name('event.signups');
    Route::post('/{id}/signout', [EventController::class, 'signout'])->name('event.signout');
});

Route::resource('/events', EventController::class);

require __DIR__.'/auth.php';
