<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Requests;

class OfficerDisqualifications extends BaseRequest
{
    /**
     * OfficerDisqualifications constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    /**
     * Get a natural officer's disqualifications.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/disqualified-officers/natural/officer_id/naturalDisqualification.html
     *
     * @param string $officerId
     * @return array
     */
    public function getNatural(string $officerId) : array
    {
        return $this->request(
            self::METHOD_GET,
            "disqualified-officers/natural/{$officerId}"
        );
    }


    /**
     * Get a corporate officer's disqualifications.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/disqualified-officers/corporate/officer_id/corporateDisqualification.html
     *
     * @param string $officerId
     * @return array
     */
    public function getCorporate(string $officerId) : array
    {
        return $this->request(
            self::METHOD_GET,
            "disqualified-officers/corporate/{$officerId}"
        );
    }
}
