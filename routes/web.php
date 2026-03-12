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


// 11. Named Routes - Generate URL ke Route Bernama
Route::get('/user/{id}/profile', function ($id) {
    return "Profile user ID: " . $id;
})->name('profile');

// Generate URL dari nama route:
// $url = route('profile');                  → /user/{id}/profile
// $url = route('profile', ['id' => 1]);     → /user/1/profile
// $url = route('profile', ['id' => 1, 'photos' => 'yes']); → /user/1/profile?photos=yes

// Redirect ke route bernama:
// return redirect()->route('profile');

// 12. Middleware pada Route Group
Route::middleware(['web'])->group(function () {
    Route::get('/dashboard', function () {
        return "Dashboard (middleware: web)";
    });

    Route::get('/dashboard/profile', function () {
        return "Dashboard Profile (middleware: web)";
    });
});

// 13. Subdomain Routing
// Route::domain('{account}.myapp.com')->group(function () {
//     Route::get('/user/{id}', function ($account, $id) {
//         return "Account: " . $account . ", User ID: " . $id;
//     });
// });

// 14. Route Prefixes
Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches URL: /admin/users
        return "Daftar Admin Users";
    });

    Route::get('/settings', function () {
        // Matches URL: /admin/settings
        return "Admin Settings";
    });
});

// 15. Route Name Prefixes
Route::name('admin.')->group(function () {
    Route::get('/admin/posts', function () {
        // Route assigned name: admin.posts
        return "Admin Posts";
    })->name('posts');

    Route::get('/admin/reports', function () {
        // Route assigned name: admin.reports
        return "Admin Reports";
    })->name('reports');
});

// Contoh kombinasi prefix + name prefix
Route::prefix('api')->name('api.')->middleware(['web'])->group(function () {
    Route::get('/products', function () {
        // URL: /api/products  |  Nama: api.products
        return "API Products";
    })->name('products');
});