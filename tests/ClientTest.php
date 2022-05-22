<?php declare(strict_types=1);

use Basketin\Api\BasketinApiClient;
use PHPUnit\Framework\TestCase;

final class ClientTest extends TestCase
{
    public function testBasketBasket(): void
    {
        $client = new BasketinApiClient('aVKFf8Akmy8OnRyN');

        $client->basket;

        $this->assertEquals(
            'aVKFf8Akmy8OnRyN',
            $client->basket
        );
    }

    public function testBasketToken(): void
    {
        $client = new BasketinApiClient('aVKFf8Akmy8OnRyN', 'YvmIRorPGyT8iIlpZz2C1wiymJs9LmONvczd4KHOW1IaSpgWwDyuKMNqGx63u3fW');

        $client->basket;

        $this->assertEquals(
            'YvmIRorPGyT8iIlpZz2C1wiymJs9LmONvczd4KHOW1IaSpgWwDyuKMNqGx63u3fW',
            $client->token
        );
    }
}