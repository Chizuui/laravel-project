<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\Frontend\HomeController;

// Route untuk template Butterfly
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/user', ManagementUserController::class);


