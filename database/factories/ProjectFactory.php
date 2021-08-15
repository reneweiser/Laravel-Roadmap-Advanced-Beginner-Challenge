<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function configure()
    {
        return $this->afterCreating(function (Project $project) {
            Task::factory()->count(5)->create(['project_id' => $project->id]);
        });
    }

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
