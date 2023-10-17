<?php

namespace App\Http\Controllers\Authorized;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authorized\Project\Request;
use App\Http\Requests\Authorized\Project\StoreRequest;
use App\Http\Requests\Authorized\Project\UpdateRequest;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Authorized.Project.index')
            ->with('collection', Auth::user()->availableProjects()->paginate(50));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Authorized.Project.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $object = $request->user()->projects()->make($request->validated());
        $object->save();

        return to_route('project.show', $object->id);
    }

    /**
     * @param Project $project
     * @return Application|Factory|View
     */
    public function show(Project $project): View|Factory|Application
    {
        return view('main.Authorized.Project.show')
            ->with('project', $project);
    }

    /**
     * @param Request $request
     * @param Project $project
     * @return Application|Factory|View
     */
    public function edit(Request $request, Project $project): View|Factory|Application
    {
        return view('main.Authorized.Project.edit')
            ->with('project', $project);
    }

    /**
     * @param UpdateRequest $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Project $project): RedirectResponse
    {
        $project->update($request->validated());

        return to_route('project.show', $project->id);
    }

    /**
     * @param Request $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function destroy(Request $request, Project $project): RedirectResponse
    {
        $project->delete();

        return to_route('project.index');
    }
}
