@extends('layouts.clean')

@section('title', __('Регистрация'))
@section('description', __(''))

@section('content')
    <main class="flex flex-col min-h-[100%]">
        <section class="flex-[1_0_auto] flex justify-center items-center">
            <div class="w-[100%] max-w-[380px] py-[15px] px-[15px]">
                <div class="mb-14">
                    <h1 class="h3">
                        {{ __('Регистрация') }}
                    </h1>
                </div>

                <x-form :action="route('register')">
                    <x-form-group>
                        <x-label for="name">{{ __('Имя пользователя') }}</x-label>
                        <x-input id="name" name="name" :value="old('name')" :invalid="$errors->has('name')" autocomplete="name" autofocus="" required=""></x-input>
                        <x-invalid-feedback :messages="$errors->get('name')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="email">{{ __('Адрес электронной почты') }}</x-label>
                        <x-input id="email" type="email" name="email" :value="old('email')" :invalid="$errors->has('email')" autocomplete="username" required=""></x-input>
                        <x-invalid-feedback :messages="$errors->get('email')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="password">{{ __('Пароль') }}</x-label>
                        <x-input id="password" type="password" name="password" :invalid="$errors->has('password')" autocomplete="new-password" required=""></x-input>
                        <x-invalid-feedback :messages="$errors->get('password')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="password_confirmation">{{ __('Подтвердите пароль') }}</x-label>
                        <x-input id="password_confirmation" type="password" name="password_confirmation" :invalid="$errors->has('password_confirmation')" autocomplete="new-password" required=""></x-input>
                        <x-invalid-feedback :messages="$errors->get('password_confirmation')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-checkbox id="agree" name="agree" :invalid="$errors->has('agree')" required="">{{ __('Я принимаю условия') }} <x-link :href="route('agreement')" target="_blank">{{ __('Пользовательского соглашения') }}</x-link></x-checkbox>
                        <x-invalid-feedback :messages="$errors->get('agree')"></x-invalid-feedback>
                    </x-form-group>

                    <div class="mt-9 mb-14">
                        <div class="flex justify-center">
                            <x-button-primary class="w-[100%]">
                                {{ __('Зарегистрироваться') }}
                            </x-button-primary>
                        </div>
                    </div>

                    <div class="text-center">
                        <div class="flex flex-col gap-3">
                            <div>
                                {{ __('Уже зарегистрированы?') }} <x-link :href="route('login')">
                                    {{ __('Войдите') }}
                                </x-link>
                            </div>
                        </div>
                    </div>
                </x-form>
            </div>
        </section>
    </main>
@endsection
