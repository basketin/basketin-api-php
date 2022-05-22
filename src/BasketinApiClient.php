<?php

namespace Basketin\Api;

class BasketinApiClient
{
    public $basket;
    public $token;

    public function __construct(Config $config)
    {
        $this->basket = $config->basket;
        $this->token = $config->token;
    }
}
