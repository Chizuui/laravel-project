<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementUserController;

Route::resource('/user', ManagementUserController::class);


Route::get('/home', function () {
    return view('home');
});


