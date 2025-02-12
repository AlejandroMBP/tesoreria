<?php

namespace App\Providers;

use App\Models\Model_bodega;
use App\Observers\ModelBodegaObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model_bodega::observe(ModelBodegaObserver::class);
    }
}
