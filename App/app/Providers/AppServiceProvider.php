<?php

namespace App\Providers;

use App\Models\Invitation;
use App\Observers\InvitationObserver;
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
        Invitation::observe(InvitationObserver::class);
    }
}
