@extends('layouts.authorized')

@section('title', $project->name)
@section('description', __(''))

@section('content')
    <div class="mb-8">
        <h1 class="h3">{{ $project->name }}</h1>
    </div>

    @if($project->hasAccessToManagement(Auth::user()))
        <div class="mb-8">
            <div class="flex items-center gap-2">
                <x-a-button-primary :href="route('project.edit', $project->id)">{{ __('Редактировать') }}</x-a-button-primary>

                <x-form :action="route('project.destroy', $project->id)">
                    @method('DELETE')

                    <x-button-danger>{{ __('Удалить') }}</x-button-danger>
                </x-form>
            </div>
        </div>
    @endif

    <div class="mb-0">
        <ul class="card flex flex-col">
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Наименование') }}:</div>
                <div>{{ $project->name }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Текстовое описание') }}:</div>
                <div>{{ $project->description }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Статус') }}:</div>
                <div>{{ $project->status->description }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время создания') }}:</div>
                <div>{{ $project->created_at }}</div>
            </li>
            <li class="flex items-center border-b border-slate-300 p-5 last:border-0 break-all">
                <div class="w-[40%] shrink-0">{{ __('Дата и время обновления') }}:</div>
                <div>{{ $project->updated_at }}</div>
            </li>
        </ul>
    </div>
@endsection
