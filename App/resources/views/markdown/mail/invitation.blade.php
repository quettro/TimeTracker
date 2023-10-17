@component('mail::message')
@component('mail::panel')
{{ __('Вас пригласили в проект') }} - {{ $invitation->project->name }}! {{ __('Вы можете принять или отклонить это приглашение. Срок действия приглашения истекает через :period.', ['period' => $invitation->tokenValidityPeriod()->forHumans()]) }}
@endcomponent
@component('mail::button', ['url' => $route])
{{ __('Посмотреть приглашение') }}
@endcomponent
@endcomponent
