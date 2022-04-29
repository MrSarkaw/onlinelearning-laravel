<?php

use App\Http\Controllers\messageController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\roomController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::post('/message/send', [messageController::class, 'store'])->name('message.store');
    Route::delete('/message/delete/{id}', [messageController::class, 'destroy'])->name('message.destroy');
});

Route::get('/profile/{id}', [profileController::class, 'index'])->name('profile');
Route::get('profile-edit', [profileController::class, 'edit'])->name('profileedit');
Route::put('profile-update', [profileController::class, 'update'])->name('profileupdate');

Route::resource('/',roomController::class, [ 'parameters' => [
    '' => 'room'
]]);


