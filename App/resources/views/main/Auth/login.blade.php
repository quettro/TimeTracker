@extends('layouts.clean')

@section('title', __('Вход в аккаунт'))
@section('description', __(''))

@section('content')
    <main class="flex flex-col min-h-[100%]">
        <section class="flex-[1_0_auto] flex justify-center items-center">
            <div class="w-[100%] max-w-[380px] py-[15px] px-[15px]">
                <div class="mb-14">
                    <h1 class="h3">
                        {{ __('Вход в аккаунт') }}
                    </h1>
                </div>

                <x-form :action="route('login')">
                    <x-form-group>
                        <x-label for="email">{{ __('Адрес электронной почты') }}</x-label>
                        <x-input id="email" type="email" name="email" :value="old('email')" :invalid="$errors->has('email')" autocomplete="username" autofocus="" required=""></x-input>
                        <x-invalid-feedback :messages="$errors->get('email')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-label for="password">{{ __('Пароль') }}</x-label>
                        <x-input id="password" type="password" name="password" :invalid="$errors->has('password')" autocomplete="current-password" required=""></x-input>
                        <x-invalid-feedback :messages="$errors->get('password')"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <x-checkbox id="remember" name="remember" :invalid="$errors->has('remember')">
                            {{ __('Запомнить меня') }}
                        </x-checkbox>
                    </x-form-group>

                    @if(session('RegisterController.status') === 'success')
                        <x-form-group>
                            <div class="font-medium text-green-600">
                                {{ __('Спасибо за регистрацию. Вы можете зайти в свой аккаунт.') }}
                            </div>
                        </x-form-group>
                    @endif

                    @if(session('NewPasswordController.status'))
                        <x-form-group>
                            <div class="font-medium text-green-600">
                                {{ session('NewPasswordController.status') }}
                            </div>
                        </x-form-group>
                    @endif

                    <div class="mt-9 mb-14">
                        <div class="flex justify-center">
                            <x-button-primary class="w-[100%]">
                                {{ __('Войти') }}
                            </x-button-primary>
                        </div>
                    </div>

                    <div class="text-center">
                        <div class="flex flex-col gap-3">
                            <div>
                                {{ __('') }} <x-link :href="route('password.request')">
                                    {{ __('Забыли пароль?') }}
                                </x-link>
                            </div>

                            <div>
                                {{ __('Ещё нет аккаунта?') }} <x-link :href="route('register')">
                                    {{ __('Зарегистрируйтесь') }}
                                </x-link>
                            </div>
                        </div>
                    </div>
                </x-form>
            </div>
        </section>
    </main>
@endsection
