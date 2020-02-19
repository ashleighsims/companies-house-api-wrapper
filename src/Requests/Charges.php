<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Requests;

class Charges extends BaseRequest
{
    /**
     * Charges constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    /**
     * Get a single charge for a company.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/charges/charge_id/getChargeDetails.html
     *
     * @param string $companyNumber
     * @param string $chargeId
     * @return array
     */
    public function get(string $companyNumber, string $chargeId) : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/charges/{$chargeId}"
        );
    }

    /**
     * Get a list of charges for a company.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/charges/getChargeList.html
     *
     * @param string $companyNumber
     * @param int $itemsPerPage
     * @param int $startIndex
     * @return array
     */
    public function list(string $companyNumber, int $itemsPerPage = self::DEFAULT_ITEMS_PER_PAGE, int $startIndex = self::DEFAULT_START_INDEX) : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/charges?items_per_page={$itemsPerPage}&start_index={$startIndex}"
        );
    }
}
