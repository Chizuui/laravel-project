<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * Di sini kita mendefinisikan Global Constraints untuk route parameter.
     * Route::pattern() akan diterapkan ke semua route yang menggunakan
     * nama parameter yang sama secara otomatis.
     */
    public function boot(): void
    {
        // Global Constraint: parameter {id} hanya boleh berisi angka
        Route::pattern('id', '[0-9]+');
    }
}
