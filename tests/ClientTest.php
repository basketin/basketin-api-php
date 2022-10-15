<?php

declare(strict_types=1);

use Basketin\Api\BasketinApiClient;
use Basketin\Api\Config;
use PHPUnit\Framework\TestCase;

final class ClientTest extends TestCase
{
    public function testBasketBasket(): void
    {
        $config = new Config([
            'basket' => 'aVKFf8Akmy8OnRyN',
        ]);
        $client = new BasketinApiClient($config);

        $this->assertEquals(
            'aVKFf8Akmy8OnRyN',
            $client->config->basket
        );
    }

    public function testBasketToken(): void
    {
        $config = new Config([
            'token' => 'YvmIRorPGyT8iIlpZz2C1wiymJs9LmONvczd4KHOW1IaSpgWwDyuKMNqGx63u3fW',
        ]);
        $client = new BasketinApiClient($config);

        $this->assertEquals(
            'YvmIRorPGyT8iIlpZz2C1wiymJs9LmONvczd4KHOW1IaSpgWwDyuKMNqGx63u3fW',
            $client->config->token
        );
    }
}
