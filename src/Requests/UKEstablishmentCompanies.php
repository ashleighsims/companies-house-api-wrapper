<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Requests;

class UKEstablishmentCompanies extends BaseRequest
{
    /**
     * UKEstablishmentCompanies constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    /**
     * Get a list of UK Establishment companies.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/uk-establishments/getCompanyUKEstablishments.html
     *
     * @param string $companyNumber
     * @return array
     */
    public function list(string $companyNumber) : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/uk-establishments"
        );
    }
}
