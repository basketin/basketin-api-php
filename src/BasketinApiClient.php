<?php

namespace Basketin\Api;

class BasketinApiClient
{
    public $basket;
    public $token;

    public function __construct(string $basket = null, string $token = null)
    {
        $this->basket = $basket;
        $this->token = $token;
    }
}
