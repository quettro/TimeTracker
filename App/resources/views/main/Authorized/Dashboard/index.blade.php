@extends('layouts.authorized')

@section('title', __('Дашборд'))
@section('description', __(''))

@section('content')
    @if (!Auth::user()->hasVerifiedEmail())
        <div class="mb-8">
            <div class="bg-slate-100 text-slate-600 border border-slate-200 p-[14px] rounded-lg">
                {{ __('Спасибо, что зарегистрировались! Необходимо подтвердить свой адрес электронной почты, перейдя по ссылке, которую мы только что отправили вам по электронной почте. Если Вы не получили электронное письмо, мы с радостью отправим вам другое.') }}

                <x-form :action="route('verification.send')" class="inline">
                    <button type="submit" class="text-slate-800 underline">{{ __('Повторно отправить письмо.') }}</button>
                </x-form>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mt-2">
                    <div class="font-medium text-green-600">
                        {{ __('Новая ссылка для подтверждения успешно была отправлена на адрес электронной почты, который Вы указали при регистрации.') }}
                    </div>
                </div>
            @endif
        </div>
    @endif
@endsection
