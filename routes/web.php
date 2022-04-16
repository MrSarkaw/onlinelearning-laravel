<?php

use App\Http\Controllers\messageController;
use App\Http\Controllers\roomController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::post('/message/send', [messageController::class, 'store'])->name('message.store');
    Route::delete('/message/delete/{id}', [messageController::class, 'destroy'])->name('message.destroy');
});

Route::resource('/',roomController::class, [ 'parameters' => [
    '' => 'room'
]]);


