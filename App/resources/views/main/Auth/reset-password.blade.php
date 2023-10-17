@extends('layouts.clean')

@section('title', __('Сброс пароля'))
@section('description', __(''))

@section('content')
    <main class="flex flex-col min-h-[100%]">
        <section class="flex-[1_0_auto] flex justify-center items-center">
            <div class="w-[100%] max-w-[380px] py-[15px] px-[15px]">
                <div class="mb-14">
                    <h1 class="h3">
                        {{ __('Сброс пароля') }}
                    </h1>
                </div>

                <x-form :action="route('password.store')">
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <x-form-group>
                        <x-label for="email">{{ __('Адрес электронной почты') }}</x-label>
                        <x-input id="email" type="email" name="email" :value="old('email', $request->email)" :invalid="$errors->has('email')" autocomplete="username" required="" readonly=""></x-input>
                        <x-invalid-feedback :messages="$errors->get('email')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="password">{{ __('Пароль') }}</x-label>
                        <x-input id="password" type="password" name="password" :invalid="$errors->has('password')" autocomplete="new-password" autofocus="" required=""></x-input>
                        <x-invalid-feedback :messages="$errors->get('password')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="password_confirmation">{{ __('Подтвердите пароль') }}</x-label>
                        <x-input id="password_confirmation" type="password" name="password_confirmation" :invalid="$errors->has('password_confirmation')" autocomplete="new-password" required=""></x-input>
                        <x-invalid-feedback :messages="$errors->get('password_confirmation')"></x-invalid-feedback>
                    </x-form-group>

                    <div class="mt-9">
                        <div class="flex justify-center">
                            <x-button-primary class="w-[100%]">
                                {{ __('Сбросить пароль') }}
                            </x-button-primary>
                        </div>
                    </div>
                </x-form>
            </div>
        </section>
    </main>
@endsection
