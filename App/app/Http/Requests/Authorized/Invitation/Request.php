<?php

namespace App\Http\Requests\Authorized\Invitation;

use App\Enums\Invitation\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        $invitation = $this->route('invitation');
        return $this->user()->email === $invitation->email && !$invitation->tokenExpired() && $invitation->status->is(StatusEnum::SENT);
    }
}
