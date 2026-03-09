<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class, 'index']);

Route::get('/form', function () {
    return view('form');
});

Route::post('/send', function () {
    return "Data sended";
});

Route::get('/profile', function () {
    return "Halaman Profile";
})->name('profile');

Route::redirect('/profile', '/user');

Route::get('/hello', function () {
    return "Hello World";
});

Route::get('/user/{id}', function ($id) {
    return "User ID : " . $id;
});

Route::get('/post/{post}/comment/{comment}', function ($post, $comment) {
//
});

Route::match(['get', 'post'], '/', function() {

});

Route::any('/', function() {

});