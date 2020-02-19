<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Laravel;

use AshleighSims\CompaniesHouseApiWrapper\CompaniesHouseApiWrapper;
use Illuminate\Support\ServiceProvider;

class CompaniesHouseApiWrapperServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/companieshouse.php', 'companieshouse');

        $this->app->singleton(CompaniesHouseApiWrapper::class, function () {
            return new CompaniesHouseApiWrapper(config('companieshouse.api-key'), config('companieshouse.base-url'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [CompaniesHouseApiWrapper::class];
    }
}
