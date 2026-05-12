<?php

namespace DataSDK\Addresses\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use DataSDK\Addresses\Models\Contact;


class ContactFactory extends Factory
{

    protected $model = Contact::class;


    public function definition()
    {

        return [
            'type' => 'default',
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->optional()->firstName,
            'last_name' => $this->faker->lastName,
            'company' => $this->faker->company,
            'vat_id' => $this->faker->optional()->regexify('[A-Z0-9]{8,12}'), // tilfældigt VAT-lignende id
            'position' => $this->faker->jobTitle,
            'phone' => $this->faker->phoneNumber,
            'mobile' => $this->faker->optional()->phoneNumber,
            'fax' => $this->faker->optional()->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->optional()->url,
            'address_id' => null, // kan sættes via factory relations
            'contactable_type' => null, // polymorf relation, kan sættes ved oprettelse
            'contactable_id' => null,
            'is_public' => $this->faker->boolean(70), // 70% chance for offentlig
            'is_primary' => $this->faker->boolean(30), // 30% chance for primær kontakt
            'notes' => $this->faker->optional()->paragraph
        ];
    }
}
