<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        View::share('our_email', 'email@example.com');
        /* View::composer('products.index', function ($view) { */
        /*     $view->with('our_email', 'email@example.coms'); */
        /* }); */
    }
}
