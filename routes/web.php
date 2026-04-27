<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\Homepage\HomeController;
use App\Http\Controllers\AdminPage\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Backend\PengalamanKerjaController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\UploadController;

Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload'])->name('upload.proses');
Route::post('/upload/resize', [UploadController::class, 'resize_upload'])->name('upload.resize');

Route::get('/dropzone', [UploadController::class, 'dropzone'])->name('dropzone');
Route::post('/dropzone/store', [UploadController::class, 'dropzone_store'])->name('dropzone.store');

Route::get('/pdf_upload', [UploadController::class, 'pdf_upload'])->name('pdf.upload');
Route::post('/pdf/store', [UploadController::class, 'pdf_store'])->name('pdf.store');

Route::get('/error/{nama?}', [ErrorController::class, 'index']);

Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);

Route::get('/formulir', [PegawaiController::class, 'formulir']);

Route::post('/formulir/proses', [PegawaiController::class, 'proses']);

Route::get('/session/create', [SessionController::class, 'create']);

Route::get('/session/show', [SessionController::class, 'show']);

Route::get('/session/delete', [SessionController::class, 'delete']);

// Route untuk template Butterfly
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/user', ManagementUserController::class);

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/dash', [DashboardController::class, 'index'])->name('dashboard');

// Routes untuk mem-bypass template Nice Admin (Demo Demos)
Route::get('/html/{path}', function ($path) {
    if (str_contains($path, '..'))
        abort(403);
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
    if (str_contains($path, '..'))
        abort(403);
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
    if (str_contains($path, '..'))
        abort(403);
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


