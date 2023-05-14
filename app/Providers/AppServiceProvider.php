<?php

namespace App\Providers;

use Cron\CronExpression;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
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
        Paginator::useBootstrapFour();
        Validator::extend('cron', function ($attribute, $value, $parameters, $validator) {
        return CronExpression::isValidExpression($value);
    });
    }
}
