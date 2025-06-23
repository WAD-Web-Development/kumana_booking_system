<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SpecialDateController as ASpecialDateController;
use App\Http\Controllers\Admin\RoomTypeController as ARoomTypeController;
use App\Http\Controllers\Auth\CustomRegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// User
Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::get('/register', [CustomRegisterController::class, 'show'])->middleware(['guest'])->name('register');


// Admin
Route::middleware(['admin'])->group(function () {

    Route::resource('special-date', ASpecialDateController::class);
    Route::resource('room-type', ARoomTypeController::class);

});
// Admin - end
