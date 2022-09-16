<?php

declare(strict_types=1);

use Basketin\Api\BasketinApiClient;
use Basketin\Api\Config;
use PHPUnit\Framework\TestCase;

final class CartClassTest extends TestCase
{
    public function testCheckHaveItemClass(): void
    {
        $config = new Config();
        $client = new BasketinApiClient($config);

        $this->assertInstanceOf('Basketin\Api\Models\Cart', $client->cart, 'Cart class not found');
    }

    public function testCheckCartClassHaveUpdateMethod(): void
    {
        $config = new Config();
        $client = new BasketinApiClient($config);

        $this->assertTrue(method_exists($client->cart, 'update'), 'Cart class not have update method');
    }
}
