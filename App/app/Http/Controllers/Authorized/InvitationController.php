<?php

namespace App\Http\Controllers\Authorized;

use App\Enums\Invitation\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authorized\Invitation\Request;
use App\Models\Invitation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class InvitationController extends Controller
{
    /**
     * @param Request $request
     * @param Invitation $invitation
     * @return View|Factory|Application
     */
    public function show(Request $request, Invitation $invitation): View|Factory|Application
    {
        return view('main.Authorized.Invitation.show')
            ->with('invitation', $invitation);
    }

    /**
     * @param Request $request
     * @param Invitation $invitation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, Invitation $invitation)
    {
        $invitation->update(['status' => StatusEnum::REJECTED]);

        return to_route('dashboard');
    }

    /**
     * @param Request $request
     * @param Invitation $invitation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept(Request $request, Invitation $invitation)
    {
        $invitation->update(['status' => StatusEnum::ACCEPTED]);

        $attributes = [];
        $attributes['user_id'] = $request->user()->id;

        $invitation->project->projectUsers()->firstOrCreate($attributes);

        return to_route('project.show', $invitation->project_id);
    }
}
