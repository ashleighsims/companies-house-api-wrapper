# Companies House Api Wrapper

This is a PHP wrapper for the Companies House API. Auto discovery for Laravel has been added so you should be able to use this out of the box with Laravel.

When using this it's best advised to use an environment file to store the API key and base url. This ensures you don't have any API keys sat in the source code of the application and also not committed into any version control.

This currently does not include the Document API which is also available.

## Installation

Before you can start using the Companies House API you will need to register your application in your companies house developer account:
https://developer.companieshouse.gov.uk/developer/applications

The API Key provided from registering your application with Companies House will be required.

Via Composer

``` bash
$ composer require ashleighsims/companies-house-api-wrapper
```

### Laravel

If you're using this package in Laravel auto discovery has been enabled so you should be able to hit the ground running.

Please ensure you've added the below environment variables to your `.env` file before starting.

#### Environment Variables
Add the following environment variables to your .env file.
```dotenv
COMPANIES_HOUSE_API_BASE_URL="https://api.companieshouse.gov.uk/"
COMPANIES_HOUSE_API_KEY="your-api-key-from-companies-house"
```

## Usage

This covers all the endpoints which are currently available on the Companies House Website as of 18th February 2020.

Each endpoint is listed below with code examples. For Laravel users you can type-hint the CompaniesHouseApiWrapper through constructors or through the facade.

### Laravel 
#### Dependency Injection Via Controller
```php
use AshleighSims\CompaniesHouseApiWrapper\CompaniesHouseApiWrapper;
...

private $companiesHouse;

public function __construct(CompaniesHouseApiWrapper $companiesHouse) {
    $this->companiesHouse = $companiesHouse;
}

public function getAddress() {
    $response = $this->companiesHouse->registeredOfficeAddress()->get('00014259');
}

...
```

#### Facade
```php
use AshleighSims\CompaniesHouseApiWrapper\Laravel\Facades\CompaniesHouseApiWrapper;

...

public function getAddress() {
    $response = CompaniesHouseApiWrapper::registeredOfficeAddress()->get('00014259');
}

...
```

### General Usage

#### Search

##### Search All

Arguments:
- Query (In this case the name of a person)

Optional Arguments:
- Items Per Page (Default 35)
- Start Index (Default 0)

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->search()->searchAll('Your Query Here'); // Returns a json_decoded associative array
```

##### Search Company

Arguments:
- Query (In this case the name of a person)

Optional Arguments:
- Items Per Page (Default 35)
- Start Index (Default 0)

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->search()->searchCompany("Deathstar Co"); // Returns a json_decoded associative array
```

##### Search Officer

Arguments:
- Query (In this case the name of a person)

Optional Arguments:
- Items Per Page (Default 35)
- Start Index (Default 0)

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->search()->searchOfficer("Luke Skywalker"); // Returns a json_decoded associative array
```

##### Search Disqualified Officer

Arguments:
- Query (In this case the name of a person)

Optional Arguments:
- Items Per Page (Default 35)
- Start Index (Default 0)

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->search()->searchDisqualifiedOfficer("Finn FN-2187"); // Returns a json_decoded associative array
```

#### Company Profile

##### Get

Arguments:
- Company Number

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->companyProfile()->get("00014259"); // Returns a json_decoded associative array
```

#### Registered Office Address

##### Get

Arguments:
- Company Number

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->registeredOfficeAddress()->get("00014259"); // Returns a json_decoded associative array
```

#### Company Officers

##### List

Arguments: 
- Company Number

Optional Arguments: 
- Items Per Page (Default 35)
- Start Index (Default 0)
- Register Type (Allowed options: directors, secretaries, llp-members) - Only works when Register View is true
- Register View (Allowed options: true or false, Default: false)
- Order By (Allowed options: appointed_on, resigned_on, surname)

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->companyOfficers()->list("00014259"); // Returns a json_decoded associative array
```

#### Filing History

##### Get

Arguments: 
- Company Number
- Transaction ID

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->filingHistory()->get("00014259", "MzI1Mjg3MzI5MGFkaXF6a2N4"); // Returns a json_decoded associative array
```

##### List 

Arguments: 
- Company Number

Optional Arguments: 
- Category (Comma Separated), 
- Items Per Page (Default 35), 
- Start Index (Default 0)

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->filingHistory()->list("00014259"); // Returns a json_decoded associative array
```

#### Insolvency

##### Get

Arguments: 
- Company Number

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->insolvency()->get("00014259", "MzI1Mjg3MzI5MGFkaXF6a2N4"); // Returns a json_decoded associative array
```

#### Charges

##### Get

Arguments: 
- Company Number
- Charge ID

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->charges()->get("00014259", "D0ReqeVClRjR7C-o5ySBBRZnxvU"); // Returns a json_decoded associative array
```

##### List

Arguments: 
- Company Number

Optional Arguments: 
- Items Per Page (Default 35), 
- Start Index (Default 0)

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->charges()->list("00014259"); // Returns a json_decoded associative array
```

#### Officer Appointment List

##### List

Arguments: 
- Officer ID

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->officerAppointmentList()->list("hLPe3meaIVQ0pqqn5AmvvS_V8pA"); // Returns a json_decoded associative array
```

#### Officer Disqualifications

##### Get Natural

Arguments: 
- Officer ID

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->officerDisqualifications()->getNatural("Ff-EjRku_DxTJnG6uBq2ie8jmLc"); // Returns a json_decoded associative array
```

##### Get Corporate

Arguments: 
- Officer ID

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->officerDisqualifications()->getCorporate("Ff-EjRku_DxTJnG6uBq2ie8jmLc"); // Returns a json_decoded associative array
```

#### UK Establishment Companies

##### List

Arguments: 
- Company Number

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->ukEstablishmentCompanies()->list("00014259"); // Returns a json_decoded associative array
```

#### Persons with Significant Control

##### List

Arguments: 
- Company Number

Optional Arguments: 
- Items Per Page (Default 35), 
- Start Index (Default 0)
- Register View (Allowed options: true or false, Default: false)

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->personsWithSignificantControl()->list("00014259"); // Returns a json_decoded associative array
```

##### Get Individual

Arguments: 
- Company Number
- PSC ID

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->personsWithSignificantControl()->getIndividual("06637776", "tRjwr1Q2U9uhtZ86JoeexAKF1Co"); // Returns a json_decoded associative array
```

##### Get Corporate

Arguments: 
- Company Number
- PSC ID

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->personsWithSignificantControl()->getCorporateEntities("00014259", "kISgW15ODWvznzBMq6Tv6ObCsLg"); // Returns a json_decoded associative array
```

##### Get Legal Persons

Arguments: 
- Company Number
- PSC ID

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->personsWithSignificantControl()->getLegalPersons("00014259", "a-legal-persons-officer-id"); // Returns a json_decoded associative array
```

##### List Statements

Arguments: 
- Company Number

Optional Arguments: 
- Items Per Page (Default 35), 
- Start Index (Default 0)
- Register View (Allowed options: true or false, Default: false)

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->personsWithSignificantControl()->listStatements("00014259", "a-legal-persons-officer-id"); // Returns a json_decoded associative array
```

##### Get Statement

Arguments: 
- Company Number
- Statement ID

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->personsWithSignificantControl()->getStatement("00014259", "statement-id"); // Returns a json_decoded associative array
```

##### Get Super Secure Person

Arguments: 
- Company Number
- Super Secure ID

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->personsWithSignificantControl()->getSuperSecurePerson("00014259", "super-secure-id"); // Returns a json_decoded associative array
```

#### Company Registers

##### Get

Arguments: 
- Company Number

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->companyRegisters()->get("00014259"); // Returns a json_decoded associative array
```

#### Company Exemptions

##### Get

Arguments: 
- Company Number

```php
$companiesHouse = new CompaniesHouseApiWrapper('your-api-key', 'https://api.companieshouse.gov.uk/');
$response = $companiesHouse->companyExemptions()->get("00014259"); // Returns a json_decoded associative array
```

## Change log

Please see the [changelog](CHANGELOG.md) for more information on what has changed recently.

## Security

If you discover any security related issues, please email sims@ashleighsims.co.uk instead of using the issue tracker.

## License

license. Please see the [license file](LICENSE.md) for more information.
