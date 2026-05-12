# Addresses

This package provides `Address` and `Contact` models, plus traits for adding addresses and contact information to Eloquent models.

## Installation

```bash
composer require datasdk/addresses
```

## Models

Import the models like this:

```php
use MyProject\Addresses\Models\Address;
use MyProject\Addresses\Models\Contact;
```

`Address` is used for polymorphic addresses through the `addressable_type` and `addressable_id` columns.

`Contact` is used for polymorphic contacts through the `contactable_type` and `contactable_id` columns.

## Usage On A Model

Add one or both traits to the model that should support addresses or contacts:

```php
use MyProject\Addresses\Traits\HasAddresses;
use MyProject\Addresses\Traits\HasContacts;

class Company extends Model
{
    use HasAddresses;
    use HasContacts;
}
```

## Address Relationships

`addresses()`

Returns all addresses for the model.

```php
$company->addresses;
```

`address()`

Returns one primary/default address as a `morphOne` relationship.

```php
$company->address;
```

`addressable()`

Available on the `Address` model. Returns the model that owns the address.

```php
$address->addressable;
```

## Address Methods

`setAddresses(array $addresses)`

Removes existing addresses and then creates the provided addresses.

```php
$company->setAddresses([
    [
        'street' => 'Testvej 1',
        'city' => 'Copenhagen',
        'post_code' => '1000',
        'country_id' => 1,
        'is_primary' => true,
    ],
]);
```

`syncAddress(array $data)`

Removes existing addresses and sets a single new address.

```php
$company->syncAddress([
    'street' => 'Testvej 1',
    'city' => 'Copenhagen',
    'post_code' => '1000',
]);
```

`setAddress(array $data)`

Adds a single address and dispatches the `AddressSet` event, allowing other parts of the system to react, for example by geocoding the address.

```php
$company->setAddress([
    'street' => 'Testvej 1',
    'city' => 'Copenhagen',
    'lat' => 55.6761,
    'lng' => 12.5683,
]);
```

`countryCode()`

Returns the country code from the model's country relationship.

```php
$company->countryCode();
```

## Address Query Scopes

`withinDistanceOfAddress($lat, $long, $distance)`

Returns models where the address is within the given distance.

```php
Company::withinDistanceOfAddress(55.6761, 12.5683, 10)->get();
```

## Contact Relationships

`contacts()`

Provided by the underlying contact trait. Returns all contacts.

```php
$company->contacts;
```

`contact()`

Returns one primary/default contact as a `morphOne` relationship.

```php
$company->contact;
```

`contactable()`

Available on the `Contact` model. Returns the model that owns the contact.

```php
$contact->contactable;
```

`address()`

Available on the `Contact` model. Returns the contact's address.

```php
$contact->address;
```

## Contact Methods

`getContact()`

Returns the first contact or creates a new one if none exists.

```php
$contact = $company->getContact();
```

`setContact($contact)`

Sets or updates contact information for the model. The method accepts an array and automatically ignores fields that are not allowed.

```php
$company->setContact([
    'first_name' => 'Ada',
    'last_name' => 'Lovelace',
    'email' => 'ada@example.com',
    'phone' => '+45 12 34 56 78',
    'is_primary' => true,
]);
```

If the data is nested under a `contact` key, it is automatically unwrapped:

```php
$company->setContact([
    'contact' => [
        'first_name' => 'Ada',
        'email' => 'ada@example.com',
    ],
]);
```
