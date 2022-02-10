<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
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
        if ($this->app->environment(['production', 'staging', 'test', 'development', 'dev'])) {
            URL::forceScheme('https');
        }

        Model::unguard();
        Model::preventLazyLoading(! $this->app->isProduction());
    }
}
