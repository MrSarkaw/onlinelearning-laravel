<?php

use App\Http\Controllers\roomController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::resource('/',roomController::class, [ 'parameters' => [
    '' => 'room'
]]);


