<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Requests;

class CompanyRegisters extends BaseRequest
{
    /**
     * CompanyRegisters constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    /**
     * Get the company registers information.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/registers/readCompanyRegister.html
     *
     * @param string $companyNumber
     * @return array
     */
    public function get(string $companyNumber) : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/registers"
        );
    }
}
