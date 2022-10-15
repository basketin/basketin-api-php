<?php

namespace Basketin\Api\Models;

use Basketin\Api\Config;
use Basketin\Api\Http\Contracts\iCustomerIdentityGetterSetter;
use Basketin\Api\Http\Contracts\iRequest;
use Basketin\Api\Http\Contracts\iTokenGetterSetter;
use Exception;

abstract class Model
{
    public $fullUrl;
    public $httpClient;

    public function __construct(Config $config)
    {
        $this->fullUrl = $config->baseUrl . '/' . $config->basket;

        $this->httpClient = new $config->httpClient;

        if (!$this->httpClient instanceof iRequest) {
            throw new Exception('Http client must implement iRequest');
        }

        if (!$this->httpClient instanceof iTokenGetterSetter) {
            throw new Exception('Http client must implement iTokenGetterSetter');
        }

        if (!$this->httpClient instanceof iCustomerIdentityGetterSetter) {
            throw new Exception('Http client must implement iCustomerIdentityGetterSetter');
        }

        $this->httpClient->setToken($config->token);
        $this->httpClient->setCustomerIdentity($config->customer_identity);
    }

    public function callRequest($uri, $data = [])
    {
        $url = $this->fullUrl . $uri;
        return $this->httpClient->request($url, $data);
    }
}
