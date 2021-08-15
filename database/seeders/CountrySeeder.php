<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $jsonContent = file_get_contents(__DIR__ . '/data/countries.json');
        $countries = json_decode($jsonContent, true);

        foreach ($countries as $country)
        {
            Country::create([
                'name' => $country['name'],
                'code' => $country['alpha2Code'],
            ]);
        }
    }
}
