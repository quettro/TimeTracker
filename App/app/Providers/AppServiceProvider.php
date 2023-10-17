<?php

namespace App\Providers;

use App\Models\Invitation;
use App\Models\Project;
use App\Observers\InvitationObserver;
use App\Observers\ProjectObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        #
        Project::observe(ProjectObserver::class);

        #
        Invitation::observe(InvitationObserver::class);
    }
}
