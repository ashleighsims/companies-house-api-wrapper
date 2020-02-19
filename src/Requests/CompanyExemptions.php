<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Requests;

class CompanyExemptions extends BaseRequest
{
    /**
     * CompanyExemptions constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    /**
     * Get the company exemptions information.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/exemptions/readCompanyExemptions.html
     *
     * @param string $companyNumber
     * @return array
     */
    public function get(string $companyNumber) : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/exemptions"
        );
    }
}
