<?php

namespace DataSDK\Addresses\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        DB::table("countries")->delete();

        foreach ($this->countries() as $countryId => $country){


            DB::table("countries")->insert(array(
                'id' => $countryId,
                'capital' => ((isset($country['capital'])) ? $country['capital'] : null),
                'citizenship' => ((isset($country['citizenship'])) ? $country['citizenship'] : null),
                'country_code' => $country['country_code'],
                'currency' => ((isset($country['currency'])) ? $country['currency'] : null),
                'currency_code' => ((isset($country['currency_code'])) ? $country['currency_code'] : null),
                'currency_sub_unit' => ((isset($country['currency_sub_unit'])) ? $country['currency_sub_unit'] : null),
                'currency_decimals' => ((isset($country['currency_decimals'])) ? $country['currency_decimals'] : null),
                'full_name' => ((isset($country['full_name'])) ? $country['full_name'] : null),
                'iso_3166_2' => $country['iso_3166_2'],
                'iso_3166_3' => $country['iso_3166_3'],
                'name' => $country['name'],
                'region_code' => $country['region_code'],
                'sub_region_code' => $country['sub_region_code'],
                'eea' => (bool)$country['eea'],
                'calling_code' => $country['calling_code'],
                'currency_symbol' => ((isset($country['currency_symbol'])) ? $country['currency_symbol'] : null),
                'flag' =>((isset($country['flag'])) ? $country['flag'] : null),
            ));

        }
    }

    private function countries(): array
    {
        return [
            58 => [
                'capital' => 'Copenhagen',
                'citizenship' => 'Danish',
                'country_code' => '208',
                'currency' => 'Danish krone',
                'currency_code' => 'DKK',
                'currency_sub_unit' => 'Ore',
                'currency_decimals' => 2,
                'full_name' => 'Kingdom of Denmark',
                'iso_3166_2' => 'DK',
                'iso_3166_3' => 'DNK',
                'name' => 'Denmark',
                'region_code' => '150',
                'sub_region_code' => '154',
                'eea' => true,
                'calling_code' => '45',
                'currency_symbol' => 'kr',
                'flag' => null,
            ],
            840 => [
                'capital' => 'Washington, D.C.',
                'citizenship' => 'American',
                'country_code' => '840',
                'currency' => 'US dollar',
                'currency_code' => 'USD',
                'currency_sub_unit' => 'Cent',
                'currency_decimals' => 2,
                'full_name' => 'United States of America',
                'iso_3166_2' => 'US',
                'iso_3166_3' => 'USA',
                'name' => 'United States',
                'region_code' => '019',
                'sub_region_code' => '021',
                'eea' => false,
                'calling_code' => '1',
                'currency_symbol' => '$',
                'flag' => null,
            ],
        ];
    }
}
