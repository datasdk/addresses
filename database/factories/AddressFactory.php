<?php

namespace DataSDK\Addresses\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use DataSDK\Addresses\Models\Address;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition()
    {
        return [
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'post_code' => $this->faker->postcode,
            'country_id' => null, // Sæt evt. en default eller brug Country::factory() hvis du har en Country-model
            'note' => $this->faker->optional()->sentence,
            'lat' => $this->faker->optional()->latitude,
            'lng' => $this->faker->optional()->longitude,
            'addressable_type' => null, // kan sættes ved oprettelse via relation
            'addressable_id' => null,
            'is_public' => $this->faker->boolean(70),   // 70% chance for offentlig
            'is_primary' => $this->faker->boolean(30),  // 30% chance for primær adresse
            'is_billing' => $this->faker->boolean(20),  // 20% chance for faktureringsadresse
            'is_shipping' => $this->faker->boolean(20), // 20% chance for leveringsadresse
        ];
    }
}
