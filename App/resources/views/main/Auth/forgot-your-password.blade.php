@extends('layouts.clean')

@section('title', __('Восстановление пароля'))
@section('description', __(''))

@section('content')
    <main class="flex flex-col min-h-[100%]">
        <section class="flex-[1_0_auto] flex justify-center items-center">
            <div class="w-[100%] max-w-[380px] py-[15px] px-[15px]">
                <div class="mb-14">
                    <h1 class="h3">
                        {{ __('Восстановление пароля') }}
                    </h1>
                </div>

                <x-form :action="route('password.email')">
                    <x-form-group>
                        <x-label for="email">{{ __('Адрес электронной почты') }}</x-label>
                        <x-input id="email" type="email" name="email" :value="old('email')" :invalid="$errors->has('email')" autofocus="" required=""></x-input>
                        <x-invalid-feedback :messages="$errors->get('email')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        @if(session('status'))
                            <div class="font-medium text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                    </x-form-group>

                    <div class="mt-9 mb-14">
                        <div class="flex justify-center">
                            <x-button-primary class="w-[100%]">
                                {{ __('Отправить') }}
                            </x-button-primary>
                        </div>
                    </div>

                    <div class="text-center">
                        <div class="flex flex-col gap-3">
                            <div>
                                {{ __('Ещё нет аккаунта?') }} <x-link :href="route('register')">
                                    {{ __('Зарегистрируйтесь') }}
                                </x-link>
                            </div>

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
