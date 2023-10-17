@extends('layouts.authorized')

@section('title', __('Пользователи'))
@section('description', __(''))

@section('content')
    <div class="mb-8">
        {{ Breadcrumbs::render('project.user.index', $project) }}
    </div>

    <div class="mb-8">
        <h1 class="h3">{{ __('Пользователи') }}</h1>
    </div>

    @if($project->hasAccessToManagement(Auth::user()))
        <div class="mb-8">
            <div class="flex items-center gap-2">
                <x-a-button-primary :href="route('project.invitation.create', $project->id)">
                    {{ __('Отправить приглашение') }}
                </x-a-button-primary>
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
                            <th class="table__th">{{ __('Дата создания') }}</th>

                            @if($project->hasAccessToManagement(Auth::user()))
                                <th class="table__th">{{ __('Действия') }}</th>
                            @endif
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
                                    <td class="table__td">{{ $object->user->email }}</td>
                                    <td class="table__td">{{ $object->created_at }}</td>

                                    @if($project->hasAccessToManagement(Auth::user()))
                                        <td class="table__td">
                                            <x-form :action="route('project.user.destroy', [$project->id, $object->id])">
                                                @method('DELETE')

                                                <button type="submit" class="!text-red-600">{{ __('Удалить') }}</button>
                                            </x-form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
