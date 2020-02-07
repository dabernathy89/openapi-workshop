<?php

namespace App\Providers;

use HKarlstrom\Middleware\OpenApiValidation;
use Illuminate\Support\ServiceProvider;
use Softonic\Laravel\Middleware\Psr15Bridge\Psr15MiddlewareAdapter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OpenApiValidation::class, function () {
            $validator = new OpenApiValidation(
                base_path('public/raffle-api-spec/reference/raffle-api.json')
            );

            return Psr15MiddlewareAdapter::adapt($validator);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
