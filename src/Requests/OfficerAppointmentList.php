<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Requests;

class OfficerAppointmentList extends BaseRequest
{
    /**
     * OfficerAppointmentList constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    /**
     * List the officer appointments.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/officers/officer_id/appointments/appointmentList.html
     *
     * @param string $officerId
     * @param int $itemsPerPage
     * @param int $startIndex
     * @return array
     */
    public function list(string $officerId,
                         int $itemsPerPage = self::DEFAULT_ITEMS_PER_PAGE,
                         int $startIndex = self::DEFAULT_START_INDEX) : array
    {
        return $this->request(
            self::METHOD_GET,
            "officers/{$officerId}/appointments?items_per_page={$itemsPerPage}&start_index={$startIndex}"
        );
    }
}
