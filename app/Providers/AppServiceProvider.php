<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
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
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');

            // Adiciona cabeçalhos para arquivos estáticos
            \Illuminate\Support\Facades\Response::macro('css', function ($path) {
                return response()->file($path, [
                    'Content-Type' => 'text/css; charset=UTF-8',
                    'X-Content-Type-Options' => 'nosniff',
                ]);
            });

            \Illuminate\Support\Facades\Response::macro('js', function ($path) {
                return response()->file($path, [
                    'Content-Type' => 'application/javascript; charset=UTF-8',
                    'X-Content-Type-Options' => 'nosniff',
                ]);
            });
        }

        Blade::component('components.toast', 'toast');
    }
}
