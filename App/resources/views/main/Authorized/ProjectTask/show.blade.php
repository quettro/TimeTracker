@extends('layouts.authorized')

@section('title', $task->title)
@section('description', __(''))

@section('content')
    <div class="mb-8">
        {{ Breadcrumbs::render('project.task.show', $project, $task) }}
    </div>

    <div class="mb-8">
        <h1 class="h3">{{ $task->title }}</h1>
    </div>

    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-2">
                <x-a-button :href="route('project.task.tracker-toggle', [$project->id, $task->id])">
                    {{ __(empty($task->tracker) ? 'Взять в работу и запустить трекер' : 'Остановить трекер') }}
                </x-a-button>
            </div>

            <div class="flex items-center gap-2">
                <x-a-button-primary :href="route('project.task.edit', [$project->id, $task->id])">{{ __('Редактировать') }}</x-a-button-primary>

                <x-form :action="route('project.task.destroy', [$project->id, $task->id])">
                    @method('DELETE')

                    <x-button-danger>{{ __('Удалить') }}</x-button-danger>
                </x-form>
            </div>
        </div>
    </div>

    <div class="mb-0">
        <ul class="card flex flex-col">
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Заголовок') }}:</div>
                <div>{{ $task->title }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Текстовое описание') }}:</div>
                <div>{{ $task->description }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Статус') }}:</div>
                <div>{{ $task->status->description }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Исполнитель') }}:</div>
                <div>{{ $task->executor->email }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Время выполнения') }}:</div>
                <div>{{ $task->currentExecutionTime() }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время создания') }}:</div>
                <div>{{ $task->created_at }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время обновления') }}:</div>
                <div>{{ $task->updated_at }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время запуска трекера') }}:</div>
                <div>{{ $task->tracker ?? '-' }}</div>
            </li>
        </ul>
    </div>
@endsection
