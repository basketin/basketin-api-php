# Basketin api PHP

## Install

```bash
composer require basketin/basketin-api-php
```

## Usage

### Set config

```php
use Basketin\Api\Config;

$config = new Config([
    'basket' => '<basket_key:string>',
    'token' => '<token:string>',
    'customer_identity' => '<customer_identity:string>',
]);
```

### Create an instance of the client

```php
use Basketin\Api\BasketinApiClient;

$client = new BasketinApiClient($config);
```

### Item model

#### Add new item to cart

```php
$client->item->create([
    'quantity' => <quantity:int>,
    'price' => <price:decimal>,
    'product' => [
        'increment_id' => <product_id:int>,
        'name' => '<quantity:string>',
        'image' => '<image_url:string>',
    ],
]);
```

#### Destroy item from cart

```php
$client->item->destroy([
    'product' => [
        'increment_id' => <product_id:int>,
    ],
]);
```
