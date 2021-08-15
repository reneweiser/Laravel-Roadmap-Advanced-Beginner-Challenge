<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'deadline' => $this->faker->dateTimeThisYear(),
            'user_id' => $this->faker->numberBetween(1, 10),
            'client_id' => $this->faker->numberBetween(1, 15),
            'status_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
