<?php

namespace App\Http\Controllers\Authorized;

use App\Enums\Task\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Authorized\ProjectTask\StoreRequest;
use App\Http\Requests\Authorized\ProjectTask\UpdateRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProjectTaskController extends Controller
{
    /**
     * @param Project $project
     * @return Application|Factory|View
     */
    public function index(Project $project): View|Factory|Application
    {
        return view('main.Authorized.ProjectTask.index')
            ->with('project', $project)->with('collection', $project->tasks()->paginate(50));
    }

    /**
     * @param Project $project
     * @return Application|Factory|View
     */
    public function create(Project $project): View|Factory|Application
    {
        return view('main.Authorized.ProjectTask.create')
            ->with('project', $project);
    }

    /**
     * @param StoreRequest $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function store(StoreRequest $request, Project $project): RedirectResponse
    {
        $attributes = $request->validated();
        $attributes['created_by'] = $request->user()->id;

        $object = $project->tasks()->make($attributes);
        $object->save();

        return to_route('project.task.show', [$project->id, $object->id]);
    }

    /**
     * @param Project $project
     * @param Task $task
     * @return Application|Factory|View
     */
    public function show(Project $project, Task $task): View|Factory|Application
    {
        return view('main.Authorized.ProjectTask.show')
            ->with('project', $project)->with('task', $task);
    }

    /**
     * @param Project $project
     * @param Task $task
     * @return Application|Factory|View
     */
    public function edit(Project $project, Task $task): View|Factory|Application
    {
        return view('main.Authorized.ProjectTask.edit')
            ->with('project', $project)->with('task', $task);
    }

    /**
     * @param UpdateRequest $request
     * @param Project $project
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Project $project, Task $task): RedirectResponse
    {
        $task->update($request->validated());

        return to_route('project.task.show', [$project->id, $task->id]);
    }

    /**
     * @param Project $project
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Project $project, Task $task): RedirectResponse
    {
        $task->delete();

        return to_route('project.task.index', $project->id);
    }

    /**
     * @param Project $project
     * @param Task $task
     * @return RedirectResponse
     */
    public function trackerToggle(Project $project, Task $task): RedirectResponse
    {
        $task->status = StatusEnum::IN_PROGRESS;
        $task->execution_time += $task->sinceTheTrackerWasLaunched();
        $task->tracker = empty($task->tracker) ? now() : null;
        $task->save();

        return to_route('project.task.show', [$project->id, $task->id]);
    }
}
