<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\Homepage\HomeController;
use App\Http\Controllers\AdminPage\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Backend\PengalamanKerjaController;

// Route untuk template Butterfly
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/user', ManagementUserController::class);

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/dash', [DashboardController::class, 'index'])->name('dashboard');

// Routes untuk mem-bypass template Nice Admin (Demo Demos)
Route::get('/html/{path}', function ($path) {
    if (str_contains($path, '..')) abort(403);
    $file = resource_path("views/AdminPage/utils/html/{$path}");
    if (file_exists($file)) {
        $mime = match (pathinfo($file, PATHINFO_EXTENSION)) {
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            default => mime_content_type($file) ?: 'text/html',
        };
        return response()->file($file, ['Content-Type' => $mime]);
    }
    abort(404);
})->where('path', '.*');

Route::get('/{folder}/{path}', function ($folder, $path) {
    if (str_contains($path, '..')) abort(403);
    $file = resource_path("views/AdminPage/utils/{$folder}/{$path}");
    if (file_exists($file)) {
        $mime = match (pathinfo($file, PATHINFO_EXTENSION)) {
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            default => mime_content_type($file) ?: 'text/plain',
        };
        return response()->file($file, ['Content-Type' => $mime]);
    }
    abort(404);
})->where('folder', 'css|js|src')->where('path', '.*');

Route::get('/assets/{path}', function ($path) {
    if (str_contains($path, '..')) abort(403);
    $file = public_path("AdminPage/assets/{$path}");
    if (file_exists($file)) {
        $mime = match (pathinfo($file, PATHINFO_EXTENSION)) {
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            default => mime_content_type($file),
        };
        return response()->file($file, ['Content-Type' => $mime]);
    }
    abort(404);
})->where('path', '.*');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/age', function () {
    return 'age check finish';
})->middleware('checkage');

Route::resource('pengalaman_kerja', PengalamanKerjaController::class);