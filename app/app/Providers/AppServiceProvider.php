<?php

namespace App\Providers;

use App\Http\Contracts\ICalculateService;
use App\Http\Services\CalculateService;
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
        return [
            ICalculateService::class
        ];
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ICalculateService::class, CalculateService::class);
    }
}
