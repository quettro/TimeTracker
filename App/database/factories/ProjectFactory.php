<?php

namespace Database\Factories;

use App\Enums\Project\StatusEnum;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Project::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->text(128),
            'status' => StatusEnum::getRandomValue(),
            'created_by' => User::factory(),
        ];
    }
}
