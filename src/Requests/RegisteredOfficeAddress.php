<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Requests;

class RegisteredOfficeAddress extends BaseRequest
{
    /**
     * RegisteredOfficeAddress constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    /**
     * Get the current address of a company.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/registered-office-address/readRegisteredOfficeAddress.html
     *
     * @param string $companyNumber
     * @return array
     */
    public function get(string $companyNumber) : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/registered-office-address"
        );
    }
}
