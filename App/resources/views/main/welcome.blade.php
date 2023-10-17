@extends('layouts.clean')

@section('title', __('Главная страница'))
@section('description', __(''))

@section('content')
    <main class="w-[100%] h-[100%] flex justify-center items-center">
        @auth
            <x-a-button-primary :href="route('dashboard')">{{ __('Личный кабинет') }}</x-a-button-primary>
        @else
            <div class="flex justify-center items-center gap-3">
                <x-a-button-primary :href="route('login')">{{ __('Авторизация') }}</x-a-button-primary>
                <x-a-button-primary :href="route('register')">{{ __('Регистрация') }}</x-a-button-primary>
            </div>
        @endauth
    </main>
@endsection
