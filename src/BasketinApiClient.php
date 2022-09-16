<?php

namespace Basketin\Api;

use Basketin\Api\Models\Cart;
use Basketin\Api\Models\Checkout;
use Basketin\Api\Models\Item;

class BasketinApiClient
{
    public $config;

    public $item;
    public $cart;
    public $checkout;

    public $basket;
    public $token;

    public function __construct(Config $config)
    {
        $this->config = $config;

        $this->item = new Item($this->config);
        $this->cart = new Cart($this->config);
        $this->checkout = new Checkout($this->config);

        $this->basket = $config->basket;
        $this->token = $config->token;
    }
}
