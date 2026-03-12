<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', [UserController::class, 'index']);

Route::post('/send', function () {
    return "Data sended";
});

Route::put('/user/{id}', function ($id) {
    return "Update user ID: " . $id;
});

Route::patch('/user/{id}', function ($id) {
    return "Patch user ID: " . $id;
});

Route::delete('/user/{id}', function ($id) {
    return "Delete user ID: " . $id;
});


Route::match(['get', 'post'], '/hello', function () {
    return "get and post";
});

Route::any('/all', function () {
    return "all method)";
});

// CSRF Protection - resources\views\form.blade.php

Route::get('/form', function () {
    return view('form');
});

// Redirect biasa (HTTP 302)
Route::redirect('/here', '/there');

// Redirect dengan status code custom
Route::redirect('/here-301', '/there', 301);

// Permanent Redirect (HTTP 301)
Route::permanentRedirect('/old-profile', '/user');

Route::view('/', 'welcome');

Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

Route::get('/user/{name?}', function ($name = null) {
    return $name;
});

Route::get('/sapa/{name?}', function ($name = 'John') {
    return $name;
});

// 7. Regular Expression Constraints

// Parameter Huruf
Route::get('/cari/{name}', function ($name) {
    return "Mencari user: " . $name;
})->where('name', '[A-Za-z]+');

// Parameter Angka
Route::get('/post/{id}', function ($id) {
    return "Post ID: " . $id;
})->where('id', '[0-9]+');

// Multiple
Route::get('/data/{name}/{id}', function ($name, $id) {
    return "Nama: " . $name . ", ID: " . $id;
})->where(['name' => '[a-z]+', 'id' => '[0-9]+']);

// 8. Global Constraints

Route::get('/user1/{id}', function ($id) {
    return "User1 ID: " . $id;
});

// 9. Encoded Forward Slashes

Route::get('/search/{search}', function ($search) {
    return $search;
})->where('search', '.*');