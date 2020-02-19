<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Requests;

class PersonsWithSignificantControl extends BaseRequest
{
    /**
     * PersonsWithSignificantControl constructor.
     *
     * @param $apiKey
     * @param $baseUrl
     */
    public function __construct($apiKey, $baseUrl)
    {
        parent::__construct($apiKey, $baseUrl);
    }

    /**
     * List the company persons with significant control.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/persons-with-significant-control/listPersonsWithSignificantControl.html
     *
     * @param string $companyNumber
     * @param int $itemsPerPage
     * @param int $startIndex
     * @param string $registerView
     * @return array
     */
    public function list(string $companyNumber,
                         int $itemsPerPage = self::DEFAULT_ITEMS_PER_PAGE,
                         int $startIndex = self::DEFAULT_START_INDEX,
                         string $registerView = 'false') : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/persons-with-significant-control?items_per_page={$itemsPerPage}&start_index={$startIndex}&register_view={$registerView}"
        );
    }

    /**
     * Get the individual person with significant control.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/persons-with-significant-control/individual/psc_id/getIndividualWithSignificantControl.html
     *
     * @param string $companyNumber
     * @param string $pscId
     * @return array
     */
    public function getIndividual(string $companyNumber, string $pscId) : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/persons-with-significant-control/individual/{$pscId}"
        );
    }

    /**
     * Get the corporate entity with significant control.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/persons-with-significant-control/corporate-entity/psc_id/getCorporateEntityWithSignificantControl.html
     *
     * @param string $companyNumber
     * @param string $pscId
     * @return array
     */
    public function getCorporateEntities(string $companyNumber, string $pscId) : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/persons-with-significant-control/corporate-entity/{$pscId}"
        );
    }

    /**
     * Get the legal person with significant control.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/persons-with-significant-control/legal-person/psc_id/getLegalPersonWithSignificantControl.html
     *
     * @param string $companyNumber
     * @param string $pscId
     * @return array
     */
    public function getLegalPersons(string $companyNumber, string $pscId) : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/persons-with-significant-control/legal-person/{$pscId}"
        );
    }

    /**
     * List the company persons with significant control statements.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/persons-with-significant-control-statements/listPersonsWithSignificantControlStatements.html
     *
     * @param string $companyNumber
     * @param int $itemsPerPage
     * @param int $startIndex
     * @param string $registerView
     * @return array
     */
    public function listStatements(string $companyNumber,
                                   int $itemsPerPage = self::DEFAULT_ITEMS_PER_PAGE,
                                   int $startIndex = self::DEFAULT_START_INDEX,
                                   string $registerView = 'false') : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/persons-with-significant-control-statements?items_per_page={$itemsPerPage}&start_index={$startIndex}&register_view={$registerView}"
        );
    }

    /**
     * Get the person with significant control statement.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/persons-with-significant-control-statements/statement_id/getPersonsWithSignificantControlStatement.html
     *
     * @param string $companyNumber
     * @param string $statementId
     * @return array
     */
    public function getStatement(string $companyNumber, string $statementId) : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/persons-with-significant-control-statements/{$statementId}"
        );
    }

    /**
     * Get the super secure person with significant control.
     * Documentation: https://developer.companieshouse.gov.uk/api/docs/company/company_number/persons-with-significant-control/super-secure/super_secure_id/getSuperSecurePersonWithSignificantControl.html
     *
     * @param string $companyNumber
     * @param string $superSecureId
     * @return array
     */
    public function getSuperSecurePerson(string $companyNumber, string $superSecureId) : array
    {
        return $this->request(
            self::METHOD_GET,
            "company/{$companyNumber}/persons-with-significant-control/super-secure/{$superSecureId}"
        );
    }
}
