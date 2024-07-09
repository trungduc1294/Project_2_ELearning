<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
     */
    public function boot(): void
    {
        // có thể tắt chế độ https bằng cách comment dòng dưới, để dùng ở local
        // bật lên thì phải dùng ngrok để tạo https
        URL::forceScheme('https');
    }
}
