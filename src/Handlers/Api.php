<?php

namespace WeDevelopCoffee\MailcoachClient\Handlers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use WeDevelopCoffee\MailcoachClient\Exceptions\MailcoachApiException;
use WeDevelopCoffee\MailcoachClient\Exceptions\MailcoachResourceExistsException;

class Api
{
    /**
     * @var array|mixed|string|null
     */
    protected $apiUrl;
    /**
     * @var array|mixed|string|null
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var array
     */
    protected $postFields;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var array
     */
    protected $filters;

    public function __construct($apiUrl, $apiKey)
    {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;

        if (env('APP_DEBUG') == true) {
            $this->client = new Client(['defaults' => [
                'verify' => false,
            ]]);
        } else {
            $this->client = new Client();
        }
    }

    /**
     * @param mixed $method
     * @return \wedevelopcoffee\WhmcsMailcoach\Engine\Api
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @param array $postFields
     * @return Api
     */
    public function setPostFields(array $postFields): Api
    {
        $this->postFields = $postFields;

        return $this;
    }

    /**
     * Generate the URL
     * @param $endPoint
     * @return string
     */
    protected function buildUrl($endPoint)
    {
        $this->url = $this->apiUrl . "/" . $endPoint;

        if (! empty($this->filters)) {
            $urlParsed = parse_url($this->url);

            // Find existing parameters.
            if (isset($url_parts['query'])) {
                parse_str($url_parts['query'], $params);
            } else {
                $params = [];
            }

            foreach ($this->filters as $key => $value) {
                $params['filter'][$key] = $value;
            }
            $urlParsed['query'] = http_build_query($params);

            if (function_exists('http_build_url')) {
                $this->url = http_build_url($urlParsed);
            } else {
                $this->url = $urlParsed['scheme'] . '://' . $urlParsed['host'] . $urlParsed['path'] . '?' . $urlParsed['query'];
            }
        }

        return $this->url;
    }

    /**
     * Communicate with the API
     * @param $method
     * @param $endPoint
     * @param array $options
     * @return \GuzzleHttp\Message\FutureResponse|\GuzzleHttp\Message\ResponseInterface|\GuzzleHttp\Ring\Future\FutureInterface|null
     * @throws MailcoachApiException
     * @throws MailcoachResourceExistsException
     */
    protected function request($method, $endPoint, $options = [])
    {
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['Content-Type'] = 'application/json';
        $options['headers']['Authorization'] = 'Bearer ' . $this->apiKey;

        $request = $this->client->createRequest($method, $this->buildUrl($endPoint), $options);

        try {
            $response = $this->client->send($request);
        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            $statusCode = $response->getStatusCode();
            switch ($statusCode) {
                case 422:
                    throw new MailcoachResourceExistsException($statusCode);

                    break;
                default:
                    throw new MailcoachApiException($statusCode);

                    break;
            }
        }

        return $response;
    }

    public function get($endpoint)
    {
        $response = $this->request('GET', $endpoint);

        return $response->json();
    }

    public function post($endpoint, $data)
    {
        $options['json'] = $data;

        $response = $this->request('POST', $endpoint, $options);

        return $response->json();
    }

    /**
     * @return array|mixed|string|null
     */
    public function getApiUrl(): mixed
    {
        return $this->apiUrl;
    }

    /**
     * @param array $filters
     * @return Api
     */
    public function setFilters(array $filters): Api
    {
        $this->filters = $filters;

        return $this;
    }
}
