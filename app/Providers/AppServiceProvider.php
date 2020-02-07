<?php

namespace App\Providers;

use HKarlstrom\Middleware\OpenApiValidation;
use Illuminate\Support\ServiceProvider;
use League\OpenAPIValidation\PSR15\ValidationMiddleware;
use League\OpenAPIValidation\PSR15\ValidationMiddlewareBuilder;
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
        $this->app->bind(ValidationMiddleware::class, function () {
            $psr15Middleware = (new ValidationMiddlewareBuilder)
                ->fromJsonFile(base_path('public/raffle-api-spec/reference/raffle-api.json'))
                ->getValidationMiddleware();

            return Psr15MiddlewareAdapter::adapt($psr15Middleware);
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
