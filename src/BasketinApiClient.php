<?php

namespace Basketin\Api;

use Basketin\Api\Models\Item;

class BasketinApiClient
{
    public $config;

    public $item;

    public $basket;
    public $token;

    public function __construct(Config $config)
    {
        $this->config = $config;

        $this->item = new Item($this->config);

        $this->basket = $config->basket;
        $this->token = $config->token;
    }
}
