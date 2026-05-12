# DataSDK Addresses

Address and contact models, traits, migrations, factories and the country seeder.

## Installation

```bash
composer require datasdk/addresses
```

## Migrations

The service provider loads package migrations automatically.

```bash
php artisan migrate
```

## Config

Publish the config file when you need to customize it:

```bash
php artisan vendor:publish --provider="DataSDK\Addresses\AddressesServiceProvider" --tag=config
```

## Seeder

```php
$this->call(\DataSDK\Addresses\Database\Seeders\CountrySeeder::class);
```
