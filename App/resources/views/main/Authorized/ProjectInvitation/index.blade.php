@extends('layouts.authorized')

@section('title', __('Приглашения в проект'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        {{ Breadcrumbs::render('project.invitation.index', $project) }}
    </div>

    <div class="mb-8">
        <h1 class="h3">{{ __('Приглашения в проект') }}</h1>
    </div>

    <div class="mb-8">
        <div class="flex items-center gap-2">
            <x-a-button-primary :href="route('project.invitation.create', $project->id)">
                {{ __('Отправить приглашение') }}
            </x-a-button-primary>
        </div>
    </div>

    @if(session('status') === 'success')
        <div class="mb-8">
            <div class="bg-green-100 text-green-600 border border-green-200 rounded-md p-4">
                {{ __('Письмо с приглашением в проект - :project, успешно было отправлено!', ['project' => $project->name]) }}
            </div>
        </div>
    @endif

    <div class="mb-0">
        <div class="mb-3">
            {{ $collection->links() }}
        </div>

        <div class="card overflow-hidden">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table__thead">
                        <tr class="table__tr">
                            <th class="table__th">{{ __('Адрес электронной почты') }}</th>
                            <th class="table__th">{{ __('Статус') }}</th>
                            <th class="table__th">{{ __('Дата создания') }}</th>
                        </tr>
                    </thead>

                    <tbody class="table__tbody">
                        @if(!$collection->count())
                            <tr class="table__tr">
                                <td class="table__td !text-center" colspan="999">-</td>
                            </tr>
                        @else
                            @foreach($collection as $object)
                                <tr class="table__tr">
                                    <td class="table__td">{{ $object->email }}</td>
                                    <td class="table__td">{{ $object->status->description }}</td>
                                    <td class="table__td">{{ $object->created_at }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
