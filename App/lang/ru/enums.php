<?php

return [
    \App\Enums\Project\StatusEnum::class => [
        \App\Enums\Project\StatusEnum::IDEA => 'Идея',
        \App\Enums\Project\StatusEnum::IN_PROGRESS => 'В процессе',
        \App\Enums\Project\StatusEnum::COMPLETED => 'Завершен',
    ],

    \App\Enums\Invitation\StatusEnum::class => [
        \App\Enums\Invitation\StatusEnum::SENT => 'Отправлено',
        \App\Enums\Invitation\StatusEnum::ACCEPTED => 'Принято',
        \App\Enums\Invitation\StatusEnum::REJECTED => 'Отклонено',
    ],
];
