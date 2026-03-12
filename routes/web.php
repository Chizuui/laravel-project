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

/*
|--------------------------------------------------------------------------
| 7. Regular Expression Constraints
|--------------------------------------------------------------------------
| Membatasi format parameter menggunakan ->where()
*/

// Parameter {name} hanya boleh huruf (A-Za-z)
Route::get('/cari/{name}', function ($name) {
    return "Mencari user: " . $name;
})->where('name', '[A-Za-z]+');

// Parameter {id} hanya boleh angka (0-9)
Route::get('/post/{id}', function ($id) {
    return "Post ID: " . $id;
})->where('id', '[0-9]+');

// Multiple parameter constraints
Route::get('/data/{id}/{name}', function ($id, $name) {
    return "ID: " . $id . ", Nama: " . $name;
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

/*
|--------------------------------------------------------------------------
| 8. Global Constraints — didefinisikan di AppServiceProvider (boot)
|--------------------------------------------------------------------------
| Route::pattern('id', '[0-9]+') diterapkan di AppServiceProvider::boot()
| Route berikut secara otomatis membatasi {id} hanya angka:
*/

Route::get('/product/{id}', function ($id) {
    return "Product ID: " . $id . " (hanya angka karena global constraint)";
});

/*
|--------------------------------------------------------------------------
| 9. Encoded Forward Slashes
|--------------------------------------------------------------------------
| Mengizinkan karakter / dalam parameter menggunakan regex .*
*/

Route::get('/search/{search}', function ($search) {
    return "Mencari: " . $search;
})->where('search', '.*');