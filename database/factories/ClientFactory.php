<?php

namespace Database\Factories;

use App\Models\Client;
use Faker\Provider\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company' => $this->faker->company(),
            'vat' => $this->faker->numberBetween(100000, 999999),
            'country' => $this->faker->countryCode(),
            'postal_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'street' => $this->faker->streetAddress(),
        ];
    }
}
