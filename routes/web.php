<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\SpecialDateController as ASpecialDateController;
use App\Http\Controllers\Admin\RoomTypeController as ARoomTypeController;
use App\Http\Controllers\Admin\EmailAttachmentController as AEmailAttachmentController;
use App\Http\Controllers\Admin\SafariBookingPriceController as ASafariBookingPriceController;
use App\Http\Controllers\Admin\PackageController as APackageController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Auth\CustomRegisterController;
use App\Http\Controllers\BookingController;

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
Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::get('/register', [CustomRegisterController::class, 'show'])->middleware(['guest'])->name('register');

// package
Route::get('/package', [PackageController::class, 'index'])->name('package.index');
Route::get('/packages/{id}', [PackageController::class, 'show'])->name('packages.show');
// package - end

// booking
Route::get('/booking/{id}', [BookingController::class, 'create'])->name('booking.create');
// booking - end

// Admin
Route::middleware(['admin'])->prefix('admin')->group(function () {

    Route::resource('special-date', ASpecialDateController::class);
    Route::resource('room-type', ARoomTypeController::class);
    Route::resource('email-attachment', AEmailAttachmentController::class);
    Route::resource('safari-booking-price', ASafariBookingPriceController::class);
    Route::resource('package', APackageController::class);

});
// Admin - end
