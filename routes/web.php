<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlaystationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::prefix('admin')->name('admin.')->group(function () {

            // USER
            Route::get('/user', [UserController::class, 'index'])->name('user.index');
            Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
            Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
            Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');
            Route::get('/user/detail/{user}', [UserController::class, 'detail'])->name('user.detail');

            // PLAYSTATION
            Route::get('/playstation', [PlaystationController::class, 'index'])->name('playstation');
            Route::post('/playstation', [PlaystationController::class, 'store'])->name('playstation.store');
            Route::put('/playstation/{playstation}', [PlaystationController::class, 'update'])->name('playstation.update');
            Route::delete('/playstation/{playstation}', [PlaystationController::class, 'destroy'])->name('playstation.destroy');

            // PAYMENT
            Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');

            // BOOKING
            Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
        });

    });

    Route::middleware('role:customer')->group(function () {
        Route::prefix('customer')->name('customer.')->group(function () {
            Route::get('/booking', [CustomerController::class, 'index'])->name('index');
            Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
            Route::delete('/booking/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');

            Route::get('/payment/{booking}', [PaymentController::class, 'create'])->name('payment.create');
            Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');

            Route::get('/settings', [CustomerController::class, 'setting'])->name('settings');
            Route::put('/settings/{user}', [CustomerController::class, 'update'])->name('settings.update');
        });
    });
});

require __DIR__ . '/auth.php';
