@extends('layouts.clean')

@section('title', __('Приглашение в проект'))
@section('description', __(''))

@section('content')
    <main class="flex flex-col min-h-[100%]">
        <section class="flex-[1_0_auto] flex justify-center items-center">
            <div class="w-[100%] max-w-[380px] py-[15px] px-[15px]">
                <div class="mb-14">
                    <h1 class="h3">
                        {{ __('Приглашение в проект') }}
                    </h1>
                </div>

                <div class="">
                    <div class="mb-8">
                        {{ __('Вас пригласили в проект - :project! Вы можете принять или отклонить это приглашение.', ['project' => $invitation->project->name]) }}
                    </div>

                    <div class="mb-0">
                        <div class="flex justify-center items-center gap-3">
                            <x-form class="w-[100%]" :action="route('invitation.accept', $invitation->token)">
                                <x-button-primary class="w-[100%]">
                                    {{ __('Принять') }}
                                </x-button-primary>
                            </x-form>

                            <x-form class="w-[100%]" :action="route('invitation.reject', $invitation->token)">
                                <x-button-danger class="w-[100%]">
                                    {{ __('Отклонить') }}
                                </x-button-danger>
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
