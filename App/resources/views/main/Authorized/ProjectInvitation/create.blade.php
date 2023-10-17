@extends('layouts.authorized')

@section('title', __('Новое приглашение'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        {{ Breadcrumbs::render('project.invitation.create', $project) }}
    </div>

    <div class="mb-8">
        <h1 class="h3">{{ __('Новое приглашение') }}</h1>
    </div>

    <div class="mb-0">
        <div class="card p-8">
            <div class="max-w-xl">
                <x-form :action="route('project.invitation.store', $project->id)">
                    <x-form-group>
                        <x-label for="email">{{ __('Адрес электронной почты') }}</x-label>
                        <x-input id="email" name="email" :value="old('email')" :invalid="$errors->has('email')"></x-input>
                        <x-invalid-feedback :messages="$errors->get('email')"></x-invalid-feedback>
                    </x-form-group>

                    <x-button-primary>{{ __('Отправить') }}</x-button-primary>
                </x-form>
            </div>
        </div>
    </div>
@endsection
