<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementUserController;

Route::get('/home', function () {
    return view('home');
});
Route::resource('/user', ManagementUserController::class);

