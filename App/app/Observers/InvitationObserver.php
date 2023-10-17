<?php

namespace App\Observers;

use App\Models\Invitation;

class InvitationObserver
{
    /**
     * @param Invitation $invitation
     * @return void
     */
    public function creating(Invitation $invitation): void
    {
        if ($invitation->token === null) {
            $invitation->token = $invitation->newToken();
        }
    }
}
