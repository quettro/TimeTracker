<?php

namespace App\Http\Controllers\Authorized;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authorized\Project\Request;
use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProjectUserController extends Controller
{
    /**
     * @param Project $project
     * @return Application|Factory|View
     */
    public function index(Project $project): View|Factory|Application
    {
        return view('main.Authorized.ProjectUser.index')
            ->with('project', $project)->with('collection', $project->projectUsers()->with(['user'])->paginate(50));
    }

    /**
     * @param Request $request
     * @param Project $project
     * @param ProjectUser $projectUser
     * @return RedirectResponse
     */
    public function destroy(Request $request, Project $project, ProjectUser $projectUser): RedirectResponse
    {
        $projectUser->delete();

        return to_route('project.user.index', $project->id);
    }
}
