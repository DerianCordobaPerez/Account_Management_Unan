<?php

namespace App\Providers;

use App\Repositories\ExchangeRate\ExchangeRateCacheRepository;
use App\Repositories\ExchangeRate\ExchangeRateRepository;
use App\Repositories\RepositoryInterface;
use App\Services\ExchangeRateService;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind(RepositoryInterface::class, ExchangeRateCacheRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
