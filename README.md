# Addresses

Denne pakke indeholder `Address` og `Contact` modeller samt traits til at give Eloquent modeller adresser og kontaktoplysninger.

## Installation

```bash
composer require datasdk/addresses
```

## Modeller

Importer modellerne sådan:

```php
use MyProject\Addresses\Models\Address;
use MyProject\Addresses\Models\Contact;
```

`Address` bruges til polymorfe adresser via felterne `addressable_type` og `addressable_id`.

`Contact` bruges til polymorfe kontaktpersoner via felterne `contactable_type` og `contactable_id`.

## Brug På En Model

Tilføj et eller begge traits på den model, der skal have adresser eller kontakter:

```php
use MyProject\Addresses\Traits\HasAddresses;
use MyProject\Addresses\Traits\HasContacts;

class Company extends Model
{
    use HasAddresses;
    use HasContacts;
}
```

## Address Relationer

`addresses()`

Returnerer alle adresser for modellen.

```php
$company->addresses;
```

`address()`

Returnerer én primær/default adresse som `morphOne`.

```php
$company->address;
```

`addressable()`

Findes på `Address` modellen og returnerer den model, adressen tilhører.

```php
$address->addressable;
```

## Address Metoder

`setAddresses(array $addresses)`

Fjerner eksisterende adresser og opretter derefter de nye adresser.

```php
$company->setAddresses([
    [
        'street' => 'Testvej 1',
        'city' => 'København',
        'post_code' => '1000',
        'country_id' => 1,
        'is_primary' => true,
    ],
]);
```

`syncAddress(array $data)`

Fjerner eksisterende adresser og sætter én ny adresse.

```php
$company->syncAddress([
    'street' => 'Testvej 1',
    'city' => 'København',
    'post_code' => '1000',
]);
```

`setAddress(array $data)`

Tilføjer en enkelt adresse og dispatcher `AddressSet` eventet, så andre dele af systemet kan reagere, for eksempel geocoding.

```php
$company->setAddress([
    'street' => 'Testvej 1',
    'city' => 'København',
    'lat' => 55.6761,
    'lng' => 12.5683,
]);
```

`countryCode()`

Returnerer landekoden fra modellens country relation.

```php
$company->countryCode();
```

## Address Query Scopes

`withinDistanceOfAddress($lat, $long, $distance)`

Finder modeller, hvor adressen ligger inden for en given afstand.

```php
Company::withinDistanceOfAddress(55.6761, 12.5683, 10)->get();
```

## Contact Relationer

`contacts()`

Kommer fra den underliggende contact-trait og returnerer alle kontakter.

```php
$company->contacts;
```

`contact()`

Returnerer én primær/default kontakt som `morphOne`.

```php
$company->contact;
```

`contactable()`

Findes på `Contact` modellen og returnerer den model, kontakten tilhører.

```php
$contact->contactable;
```

`address()`

Findes på `Contact` modellen og returnerer kontaktens adresse.

```php
$contact->address;
```

## Contact Metoder

`getContact()`

Henter den første kontakt eller opretter en ny, hvis der ikke findes en.

```php
$contact = $company->getContact();
```

`setContact($contact)`

Sætter eller opdaterer kontaktinformation for modellen. Metoden accepterer et array og ignorerer automatisk felter, der ikke er tilladt.

```php
$company->setContact([
    'first_name' => 'Ada',
    'last_name' => 'Lovelace',
    'email' => 'ada@example.com',
    'phone' => '+45 12 34 56 78',
    'is_primary' => true,
]);
```

Hvis data ligger under en `contact` nøgle, pakkes den automatisk ud:

```php
$company->setContact([
    'contact' => [
        'first_name' => 'Ada',
        'email' => 'ada@example.com',
    ],
]);
```
