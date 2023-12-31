<?php

use App\Models\Project;
use App\Models\Task;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push(__('Дашборд'), route('dashboard'));
});

Breadcrumbs::for('task.index', function (BreadcrumbTrail $trail) {
    $trail->push(__('Мои задачи'), route('task.index'));
});

Breadcrumbs::for('statistics.index', function (BreadcrumbTrail $trail) {
    $trail->push(__('Статистика'), route('statistics.index'));
});

Breadcrumbs::for('project.index', function (BreadcrumbTrail $trail) {
    $trail->push(__('Проекты'), route('project.index'));
});

Breadcrumbs::for('project.create', function (BreadcrumbTrail $trail) {
    $trail->parent('project.index');
    $trail->push(__('Новая запись'), route('project.create'));
});

Breadcrumbs::for('project.show', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('project.index');
    $trail->push($project->name, route('project.show', $project->id));
});

Breadcrumbs::for('project.edit', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('project.show', $project);
    $trail->push(__('Редактирование'), route('project.edit', $project->id));
});

Breadcrumbs::for('project.user.index', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('project.show', $project);
    $trail->push(__('Пользователи'), route('project.user.index', $project->id));
});

Breadcrumbs::for('project.invitation.index', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('project.show', $project);
    $trail->push(__('Приглашения в проект'), route('project.invitation.index', $project->id));
});

Breadcrumbs::for('project.invitation.create', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('project.invitation.index', $project);
    $trail->push(__('Новое приглашение'), route('project.invitation.create', $project->id));
});

Breadcrumbs::for('project.task.index', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('project.show', $project);
    $trail->push(__('Задачи'), route('project.task.index', $project->id));
});

Breadcrumbs::for('project.task.create', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('project.task.index', $project);
    $trail->push(__('Новая задача'), route('project.task.create', $project->id));
});

Breadcrumbs::for('project.task.show', function (BreadcrumbTrail $trail, Project $project, Task $task) {
    $trail->parent('project.task.index', $project);
    $trail->push($task->title, route('project.task.show', [$project->id, $task->id]));
});

Breadcrumbs::for('project.task.edit', function (BreadcrumbTrail $trail, Project $project, Task $task) {
    $trail->parent('project.task.show', $project, $task);
    $trail->push(__('Редактирование'), route('project.task.edit', [$project->id, $task->id]));
});
