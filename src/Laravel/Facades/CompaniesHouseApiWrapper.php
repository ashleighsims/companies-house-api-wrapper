<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class CompaniesHouseApiWrapper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \AshleighSims\CompaniesHouseApiWrapper\CompaniesHouseApiWrapper::class;
    }
}
