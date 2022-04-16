<?php

use App\Http\Controllers\roomController;
use Illuminate\Support\Facades\Route;



Route::resource('/',roomController::class);
Auth::routes();

