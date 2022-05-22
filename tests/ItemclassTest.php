<?php

declare(strict_types=1);

use Basketin\Api\BasketinApiClient;
use Basketin\Api\Config;
use PHPUnit\Framework\TestCase;

final class ItemclassTest extends TestCase
{
    public function testCheckHaveItemClass(): void
    {
        $config = new Config();
        $client = new BasketinApiClient($config);

        $this->assertInstanceOf('Basketin\Api\Models\Item', $client->item, 'Item class not found');
    }

    public function testCheckItemClassHaveCreateMethod(): void
    {
        $config = new Config();
        $client = new BasketinApiClient($config);

        $this->assertTrue(method_exists($client->item, 'create'), 'Item class not have create method');
    }

    public function testCheckItemClassHaveDestroyMethod(): void
    {
        $config = new Config();
        $client = new BasketinApiClient($config);

        $this->assertTrue(method_exists($client->item, 'destroy'), 'Item class not have destroy method');
    }
}
