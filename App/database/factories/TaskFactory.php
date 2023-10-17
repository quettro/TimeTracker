<?php

namespace Database\Factories;

use App\Enums\Task\StatusEnum;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Task::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(64),
            'description' => $this->faker->text(128),
            'status' => StatusEnum::getRandomValue(),
            'execution_time' => $this->faker->numberBetween(0, 100000),
            'project_id' => Project::factory(),
            'executor_id' => User::factory(),
        ];
    }
}
