<?php

namespace App\Providers;

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
        if (Request()->server->has('HTTP_X_ORIGINAL_HOST')) {
            $this->app['url']->forceRootUrl(Request()->server->get('HTTP_X_FORWARDED_PROTO').'://'.Request()->server->get('HTTP_X_ORIGINAL_HOST'));
        }
    }
}
