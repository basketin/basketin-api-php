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
    'platform' => '<platform:string>',
    'basket' => '<basket_key:string>',
    'token' => '<token:string>',
    'cartHash' => '<cartHash:string>',
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
    'product_id' => <product_id:int>,
    'quantity' => <quantity:int>,
    'price' => <price:decimal>,
    'product' => [
        'name' => '<quantity:string>',
        'image_url' => '<image_url:string>',
    ],
]);
```

#### Destroy item from cart

```php
$client->item->destroy([
    'product_id' => <product_id:int>,
]);
```

### Cart model

#### Update cart items

```php
$client->cart->update([
    [
        'product_id' => <product_id:int>,
        'quantity' => <quantity:int>,
    ]
]);
```

### Checkout model

#### Make checkout

```php
$client->checkout->thankyou([
    'name' => '<name:string>',
    'email' => '<email:string>',
    'phone' => '<phone:string>',
    'country' => '<country:string>',
]);
```
