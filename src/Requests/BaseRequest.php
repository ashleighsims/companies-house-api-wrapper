<?php

namespace AshleighSims\CompaniesHouseApiWrapper\Requests;

use GuzzleHttp\Client;

/**
 * Class BaseRequest
 * @package AshleighSims\CompaniesHouseApiWrapper\Requests
 */
abstract class BaseRequest
{
    /**
     * @var string
     */
    protected const METHOD_GET = 'GET';

    /**
     * @var integer
     */
    protected const DEFAULT_ITEMS_PER_PAGE = 35;

    /**
     * @var integer
     */
    protected const DEFAULT_START_INDEX = 0;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var Client
     */
    private $client;

    /**
     * BaseRequest constructor.
     *
     * @param string $apiKey
     * @param string $baseUrl
     */
    public function __construct(string $apiKey, string $baseUrl)
    {
        $this->apiKey = $apiKey;
        $this->baseUrl = $baseUrl;

        $this->setClient();
    }

    /**
     * Return the HTTP client for use
     *
     * @return Client
     */
    private function getClient()
    {
        return $this->client;
    }

    /**
     * Setup the client and assign the base_uri option to the client
     *
     * @return void
     */
    private function setClient(): void
    {
        $this->client = new Client([
            'base_uri' => $this->baseUrl
        ]);
    }

    /**
     * The request function for using the client to call the API
     *
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return array
     */
    protected function request(string $method, string $uri, array $options = []) : array
    {
        $options = $this->setApiKey($options);

        try {
            $response = $this->getClient()->request($method, $uri, $options);

            $responseArray = json_decode($response->getBody()->getContents(), true);

            if(! $responseArray) {
                return ['message' => 'No results found'];
            }

            return $responseArray;
        } catch (\Exception $e){
            return $this->parseError($e);
        }
    }

    /**
     * Parse the error and add additional information to return
     *
     * @param \Exception $e
     * @return array
     */
    private function parseError(\Exception $e) : array
    {
        $errors = json_decode($e->getResponse()->getBody()->getContents(), true);
        $errors["code"] = $e->getCode();

        return $errors;
    }

    /**
     * Set the API key to the header of the request
     *
     * @param array $options
     * @return array
     */
    private function setApiKey(array $options) : array
    {
        $options['headers']['Authorization'] = $this->apiKey;

        return $options;
    }
}
