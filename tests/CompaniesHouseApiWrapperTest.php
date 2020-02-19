<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Tests;

use AshleighSims\CompaniesHouseApiWrapper\CompaniesHouseApiWrapper;
use Orchestra\Testbench\TestCase;

class CompaniesHouseApiWrapperTest extends TestCase
{
    /** @test **/
    public function it_should_throw_exception_when_no_api_key_provided()
    {
        // Arrange
        $apiKey = '';
        $this->expectException(\Exception::class);

        // Act
        $companiesHouse = new CompaniesHouseApiWrapper($apiKey);

        // Assert
    }
}
