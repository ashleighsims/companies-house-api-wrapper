<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Requests;

class Search extends BaseRequest
{
    /**
     * Search constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    /**
     * Search Companies House.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/search/search.html
     *
     * @param string $query
     * @param int $itemsPerPage
     * @param int $startIndex
     * @return array
     */
    public function searchAll(string $query,
                              int $itemsPerPage = self::DEFAULT_ITEMS_PER_PAGE,
                              int $startIndex = self::DEFAULT_START_INDEX) : array
    {
        return $this->request(
            self::METHOD_GET,
            "search?q={$query}&items_per_page={$itemsPerPage}&start_index={$startIndex}"
        );
    }

    /**
     * Search companies.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/search/companies/companysearch.html
     *
     * @param string $companyName
     * @param int $itemsPerPage
     * @param int $startIndex
     * @return array
     */
    public function searchCompany(string $companyName,
                                  int $itemsPerPage = self::DEFAULT_ITEMS_PER_PAGE,
                                  int $startIndex = self::DEFAULT_START_INDEX) : array
    {
        return $this->request(
            self::METHOD_GET,
            "search/companies?q={$companyName}&items_per_page={$itemsPerPage}&start_index={$startIndex}"
        );
    }

    /**
     * Search disqualified officers.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/search/disqualified-officers/disqualifiedofficersearch.html
     *
     * @param string $officerName
     * @param int $itemsPerPage
     * @param int $startIndex
     * @return array
     */
    public function searchOfficer(string $officerName,
                                  int $itemsPerPage = self::DEFAULT_ITEMS_PER_PAGE,
                                  int $startIndex = self::DEFAULT_START_INDEX) : array
    {
        return $this->request(
            self::METHOD_GET,
            "search/officers?q={$officerName}&items_per_page={$itemsPerPage}&start_index={$startIndex}"
        );
    }

    /**
     * Search disqualified officers.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/search/disqualified-officers/disqualifiedofficersearch.html
     *
     * @param string $officerName
     * @param int $itemsPerPage
     * @param int $startIndex
     * @return array
     */
    public function searchDisqualifiedOfficer(string $officerName,
                                              int $itemsPerPage = self::DEFAULT_ITEMS_PER_PAGE,
                                              int $startIndex = self::DEFAULT_START_INDEX) : array
    {
        return $this->request(
            self::METHOD_GET,
            "search/disqualified-officers?q={$officerName}&items_per_page={$itemsPerPage}&start_index={$startIndex}"
        );
    }
}
