<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        #
        $user = User::factory()->create(['name' => 'username', 'email' => 'username@bk.ru']);

        #
        $projectCollectionOne = Project::factory()->count(100)->create();
        $projectCollectionTwo = Project::factory()->count(10)->create(['created_by' => $user->id]);
        $projectCollection = $projectCollectionOne->merge($projectCollectionTwo);

        #
        foreach (User::lazy() as $user) {
            /* @var $project Project */

            $attributes = [];
            $attributes['user_id'] = $user->id;

            $project = $projectCollection->random()->first();
            $project->projectUsers()->firstOrCreate($attributes);
        }

        #
        Task::factory()
            ->count(1000)
            ->sequence(
                function (Sequence $sequence) {
                    $object = ProjectUser::query()->inRandomOrder()->first();

                    $attributes = [];
                    $attributes['project_id'] = $object->project_id;
                    $attributes['executor_id'] = $object->user_id;
                    $attributes['created_by'] = $object->user_id;

                    return $attributes;
                }
            )
            ->create();
    }
}
