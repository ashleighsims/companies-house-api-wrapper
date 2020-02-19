<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Requests;

class CompanyOfficers extends BaseRequest
{
    /**
     * CompanyOfficers constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    /**
     * List the company officers.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/officers/officerList.html
     *
     * @param string $companyNumber
     * @param int $itemsPerPage
     * @param string $registerType
     * @param string $registerView
     * @param int $startIndex
     * @param string $orderBy
     * @return array
     */
    public function list(string $companyNumber,
                         int $itemsPerPage = self::DEFAULT_ITEMS_PER_PAGE,
                         int $startIndex = self::DEFAULT_START_INDEX,
                         string $registerType = '',
                         string $registerView = 'false',
                         string $orderBy = 'appointed_on') : array
    {
        // register_type = ['directors', 'secretaries', 'llp-members']
        // register_view = true or false
        // order_by = ['appointed_on', 'resigned_on', 'surname']

        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/officers?items_per_page={$itemsPerPage}&start_index={$startIndex}&register_type={$registerType}&register_view={$registerView}&order_by={$orderBy}"
        );
    }
}
