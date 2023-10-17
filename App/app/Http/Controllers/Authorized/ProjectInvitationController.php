<?php

namespace App\Http\Controllers\Authorized;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authorized\Project\Request;
use App\Http\Requests\Authorized\ProjectInvitation\StoreRequest;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProjectInvitationController extends Controller
{
    /**
     * @param Request $request
     * @param Project $project
     * @return Application|Factory|View
     */
    public function index(Request $request, Project $project): View|Factory|Application
    {
        return view('main.Authorized.ProjectInvitation.index')
            ->with('project', $project)->with('collection', $project->invitations()->paginate(50));
    }

    /**
     * @param Request $request
     * @param Project $project
     * @return Application|Factory|View
     */
    public function create(Request $request, Project $project): View|Factory|Application
    {
        return view('main.Authorized.ProjectInvitation.create')
            ->with('project', $project);
    }

    /**
     * @param StoreRequest $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function store(StoreRequest $request, Project $project): RedirectResponse
    {
        $request->sendAnInvitationLetter();

        return to_route('project.invitation.index', $project->id)
            ->with('status', 'success');
    }
}
