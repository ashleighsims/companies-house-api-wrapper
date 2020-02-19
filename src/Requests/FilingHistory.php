<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Requests;

class FilingHistory extends BaseRequest
{
    /**
     * FilingHistory constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    /**
     * Get the filing history of the company.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/filing-history/transaction_id/getFilingHistoryItem.html
     *
     * @param string $companyNumber
     * @param string $transactionId
     * @return array
     */
    public function get(string $companyNumber, string $transactionId) : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/filing-history/{$transactionId}"
        );
    }

    /**
     * Get the filing history of the company.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/filing-history/getFilingHistoryList.html
     *
     * @param string $companyNumber
     * @param string $category
     * @param int $itemsPerPage
     * @param int $startIndex
     * @return array
     */
    public function list(string $companyNumber,
                         string $category = '',
                         int $itemsPerPage = self::DEFAULT_ITEMS_PER_PAGE,
                         int $startIndex = self::DEFAULT_START_INDEX) : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/filing-history?category={$category}&items_per_page={$itemsPerPage}&start_index={$startIndex}"
        );
    }
}
