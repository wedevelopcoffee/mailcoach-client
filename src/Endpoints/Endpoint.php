<?php

namespace WeDevelopCoffee\MailcoachClient\Endpoints;

use WeDevelopCoffee\MailcoachClient\Mailcoach;
use WeDevelopCoffee\MailcoachClient\Resources\Resource;

class Endpoint
{
    /**
     * @var Mailcoach
     */
    protected Mailcoach $mailcoach;

    /**
     * This is *optional*. When defined, any {id} record in the class is replaced.
     * @var int
     */
    public int $id;
    protected array $data;
    protected array $filters = [];

    public function __construct(Mailcoach $mailcoach)
    {
        $this->mailcoach = $mailcoach;
    }

    public function get()
    {
        return $this->makeRequest($this->getEndpoint());
    }

    public function first()
    {
        return $this->makeRequestWithLink('first');
    }

    public function next()
    {
        return $this->makeRequestWithLink('next');
    }

    public function previous()
    {
        return $this->makeRequestWithLink('prev');
    }

    public function last()
    {
        return $this->makeRequestWithLink('last');
    }

    public function makeRequestWithLink($link)
    {
        if (!isset($this->response['links'][$link]) || empty($this->response['links'][$link])) {
            return [];
        }

        $nextUrl = $this->response['links'][$link];

        return $this->makeRequest($nextUrl);
    }

    /**
     * Make the request
     * @param $endpoint
     * @return array|void
     */
    protected function makeRequest($endpoint)
    {
        // Prepare the request
        // Navigation URLs provided by the API include https. We need to remove this here.
        if (substr($endpoint, 0, 4) == 'http') {
            $endpoint = str_replace($this->mailcoach->api->getApiUrl() . '/', '', $endpoint);
        }

        // Reset the data
        $this->data = [];
        $this->response = '';

        $this->mailcoach->api->setFilters($this->filters);
        $this->response = $this->mailcoach->api->get($endpoint);

        return $this->parseResponse();
    }

    /**
     * Send a post.
     * @param $data
     * @return array
     */
    public function create($data)
    {
        $postData = $this->getPostDataFromResource($data);
        $this->response = $this->mailcoach->api->post($this->getEndpoint(), $postData);

        return $this->parseResponse();
    }

    /**
     * Returns the endpoint. You can override this class to generate an endpoint.
     * @return string
     */
    public function getEndpoint()
    {
        if (!empty($this->id)) {
            $endpoint = str_replace('{id}', $this->id, $this->endpoint);
        } else {
            $endpoint = $this->endpoint;
        }

        return $endpoint;
    }

    /**
     * @param $data
     * @return Resource
     */
    public function createResource($data)
    {
        // Start guessing the resource name.
        $path = explode('\\', get_class($this));
        $className = array_pop($path);
        $namespace = str_replace('\\Endpoints', '\\Resources', __NAMESPACE__);
        $resourceName = $namespace . '\\' . $className;

        $resource = new $resourceName($this->mailcoach, $data);

        return $resource;
    }

    /**
     * @param int $id
     * @return Endpoint
     */
    public function setId(int $id): Endpoint
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param array $filters
     * @return Endpoint
     */
    public function setFilter($key, $data): Endpoint
    {
        $this->filters[$key] = $data;

        return $this;
    }

    /**
     * Convert a resource to an array.
     * @param $data
     * @return array
     */
    protected function getPostDataFromResource($data)
    {
        $object = clone $data;
        $ignorePostFields = $object->ignore_post_fields;
        $ignorePostFields[] = 'ignorePostFields';
        $ignorePostFields[] = 'mailcoach';

        $objectVars = get_object_vars($data);
        $postData = [];

        foreach ($objectVars as $tmpVar => $value) {
            // Ignore fields
            if (in_array($tmpVar, $ignorePostFields)) {
                continue;
            }

            if (empty($value)) {
                continue;
            }

            $postData [$tmpVar] = $value;
        }

        return $postData;
    }

    /**
     * @return array
     */
    protected function parseResponse(): mixed
    {
        if (empty($this->response['data'])) {
            // There is no data.
            return [];
        }

        // A single record is returned.
        if (isset($this->response['data']['id'])) {
            return $this->createResource($this->response['data']);
        }

        // Store the response
        foreach ($this->response['data'] as $object) {
            $this->data[] = $this->createResource($object);
        }

        return $this->data;
    }
}
