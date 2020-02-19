<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Requests;

class Insolvency extends BaseRequest
{
    /**
     * Insolvency constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    /**
     * Get company insolvency information.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/insolvency/readCompanyInsolvency.html
     *
     * @param string $companyNumber
     * @return array
     */
    public function get(string $companyNumber) : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/insolvency"
        );
    }
}
