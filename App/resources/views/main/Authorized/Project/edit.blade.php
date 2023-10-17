@extends('layouts.authorized')

@section('title', __('Редактирование'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        {{ Breadcrumbs::render('project.edit', $project) }}
    </div>

    <div class="mb-8">
        <h1 class="h3">{{ __('Редактирование') }}</h1>
    </div>

    <div class="mb-0">
        <div class="card p-8">
            <div class="max-w-xl">
                <x-form :action="route('project.update', $project->id)">
                    @method('PATCH')

                    <x-form-group>
                        <x-label for="name">{{ __('Наименование') }}</x-label>
                        <x-input id="name" name="name" :value="old('name', $project->name)" :invalid="$errors->has('name')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('name')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="description">{{ __('Текстовое описание') }}</x-label>
                        <x-textarea id="description" name="description" :value="old('description', $project->description)" :invalid="$errors->has('description')"></x-textarea>
                        <x-invalid-feedback :messages="$errors->get('description')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="status">{{ __('Статус') }}</x-label>
                        <x-select id="status" name="status" :option="\App\Enums\Project\StatusEnum::asSelectArray()" :o_selected="[old('status', $project->status->value)]" :invalid="$errors->has('status')"></x-select>
                        <x-invalid-feedback :messages="$errors->get('status')"></x-invalid-feedback>
                    </x-form-group>

                    <x-button-primary>{{ __('Сохранить') }}</x-button-primary>
                </x-form>
            </div>
        </div>
    </div>
@endsection
