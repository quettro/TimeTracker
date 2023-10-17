<?php

namespace App\Observers;

use App\Models\Project;

class ProjectObserver
{
    /**
     * @param Project $project
     * @return void
     */
    public function created(Project $project): void
    {
        $attributes = [];
        $attributes['user_id'] = $project->created_by;

        $project->projectUsers()->create($attributes);
    }
}
