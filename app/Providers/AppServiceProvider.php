<?php

namespace App\Providers;

use App\Http\composers\topComposer;
use App\Http\composers\dereComposer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('inc.base', topComposer::class);
        View::composer('inc.dere_blog', dereComposer::class);
        View::composer('inc.dere_pro', dereComposer::class);
    }
}
