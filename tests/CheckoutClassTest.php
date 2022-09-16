<?php

declare(strict_types=1);

use Basketin\Api\BasketinApiClient;
use Basketin\Api\Config;
use PHPUnit\Framework\TestCase;

final class CheckoutClassTest extends TestCase
{
    public function testCheckHaveItemClass(): void
    {
        $config = new Config();
        $client = new BasketinApiClient($config);

        $this->assertInstanceOf('Basketin\Api\Models\Checkout', $client->checkout, 'Checkout class not found');
    }

    public function testCheckCheckoutClassHaveThankyouMethod(): void
    {
        $config = new Config();
        $client = new BasketinApiClient($config);

        $this->assertTrue(method_exists($client->checkout, 'thankyou'), 'thankyou class not have thankyou method');
    }
}
