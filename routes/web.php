<?php

use App\Http\Controllers\PerusahaanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dataperusahaan', PerusahaanController::class);
