<?php

namespace AshleighSims\CompaniesHouseApiWrapper;

use AshleighSims\CompaniesHouseApiWrapper\Requests\Charges;
use AshleighSims\CompaniesHouseApiWrapper\Requests\CompanyExemptions;
use AshleighSims\CompaniesHouseApiWrapper\Requests\CompanyOfficers;
use AshleighSims\CompaniesHouseApiWrapper\Requests\CompanyProfile;
use AshleighSims\CompaniesHouseApiWrapper\Requests\CompanyRegisters;
use AshleighSims\CompaniesHouseApiWrapper\Requests\FilingHistory;
use AshleighSims\CompaniesHouseApiWrapper\Requests\Insolvency;
use AshleighSims\CompaniesHouseApiWrapper\Requests\OfficerAppointmentList;
use AshleighSims\CompaniesHouseApiWrapper\Requests\OfficerDisqualifications;
use AshleighSims\CompaniesHouseApiWrapper\Requests\PersonsWithSignificantControl;
use AshleighSims\CompaniesHouseApiWrapper\Requests\RegisteredOfficeAddress;
use AshleighSims\CompaniesHouseApiWrapper\Requests\Search;
use AshleighSims\CompaniesHouseApiWrapper\Requests\UKEstablishmentCompanies;

class CompaniesHouseApiWrapper
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * CompaniesHouseApiWrapper constructor.
     *
     * @param $apiKey
     * @param string $baseUrl
     * @throws \Exception
     */
    public function __construct($apiKey, $baseUrl = 'https://api.companieshouse.gov.uk/')
    {
        if($apiKey == '') {
            throw new \Exception('No API Key has been provided.');
        }

        $this->apiKey = $apiKey;
        $this->baseUrl = $baseUrl;
    }

    /**
     * Method returns the Search class for the search endpoints.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/search-overview/search-overview.html
     *
     * @return Search
     */
    public function search() : Search
    {
        return new Search($this->apiKey, $this->baseUrl);
    }

    /**
     * Method returns the CompanyProfile class for the company profile endpoints.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/company_number.html
     *
     * @return CompanyProfile
     */
    public function companyProfile() : CompanyProfile
    {
        return new CompanyProfile($this->apiKey, $this->baseUrl);
    }

    /**
     * Method returns the RegisteredOfficeAddress class for the registered office address endpoints.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/registered-office-address/registered-office-address.html
     *
     * @return RegisteredOfficeAddress
     */
    public function registeredOfficeAddress() : RegisteredOfficeAddress
    {
        return new RegisteredOfficeAddress($this->apiKey, $this->baseUrl);
    }

    /**
     * Method returns the CompanyOfficers class for the company officers endpoints.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/officers/officers.html
     *
     * @return CompanyOfficers
     */
    public function companyOfficers() : CompanyOfficers
    {
        return new CompanyOfficers($this->apiKey, $this->baseUrl);
    }

    /**
     * Method returns the FilingHistory class for the filing history endpoints.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/filing-history/filing-history.html
     *
     * @return FilingHistory
     */
    public function filingHistory() : FilingHistory
    {
        return new FilingHistory($this->apiKey, $this->baseUrl);
    }

    /**
     * Method returns the Insolvency class for the insolvency endpoints.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/insolvency/insolvency.html
     *
     * @return Insolvency
     */
    public function insolvency() : Insolvency
    {
        return new Insolvency($this->apiKey, $this->baseUrl);
    }

    /**
     * Method returns the Charges class for the charges endpoints.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/charges/charges.html
     *
     * @return Charges
     */
    public function charges() : Charges
    {
        return new Charges($this->apiKey, $this->baseUrl);
    }

    /**
     * Method returns the OfficerAppointmentList class for the officer appointment list endpoints.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/officers/officer_id/appointments/appointments.html
     *
     * @return OfficerAppointmentList
     */
    public function officerAppointmentList() : OfficerAppointmentList
    {
        return new OfficerAppointmentList($this->apiKey, $this->baseUrl);
    }

    /**
     * Method returns the OfficerDisqualifications class for the officer disqualification endpoints.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/disqualified-officers/disqualified-officers.html
     *
     * @return OfficerDisqualifications
     */
    public function officerDisqualifications() : OfficerDisqualifications
    {
        return new OfficerDisqualifications($this->apiKey, $this->baseUrl);
    }

    /**
     * Method returns the UKEstablishmentCompanies class for the UK establishment companies endpoints.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/uk-establishments/uk-establishments.html
     *
     * @return UKEstablishmentCompanies
     */
    public function ukEstablishmentCompanies() : UKEstablishmentCompanies
    {
        return new UKEstablishmentCompanies($this->apiKey, $this->baseUrl);
    }

    /**
     * Method returns the PersonsWithSignificantControl class for the persons with significant control endpoints.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/persons-with-significant-control/persons-with-significant-control.html
     *
     * @return PersonsWithSignificantControl
     */
    public function personsWithSignificantControl() : PersonsWithSignificantControl
    {
        return new PersonsWithSignificantControl($this->apiKey, $this->baseUrl);
    }

    /**
     * Method returns the CompanyRegisters class for the company registers endpoints.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/registers/registers.html
     *
     * @return CompanyRegisters
     */
    public function companyRegisters() : CompanyRegisters
    {
        return new CompanyRegisters($this->apiKey, $this->baseUrl);
    }

    /**
     * Method returns the CompanyExemptions class for the company exemptions endpoints.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/exemptions/exemptions.html
     *
     * @return CompanyExemptions
     */
    public function companyExemptions() : CompanyExemptions
    {
        return new CompanyExemptions($this->apiKey, $this->baseUrl);
    }
}
