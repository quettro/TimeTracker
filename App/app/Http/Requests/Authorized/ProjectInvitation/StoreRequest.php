<?php

namespace App\Http\Requests\Authorized\ProjectInvitation;

use App\Enums\Invitation\StatusEnum;
use App\Http\Requests\Authorized\Project\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Throwable;

class StoreRequest extends Request
{
    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'email' => __('Адрес электронной почты'),
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.not_in' => __('Невозможно отправить приглашение в проект самому себе.'),
        ];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required', 'string', 'email', 'max:255', Rule::notIn([$this->user()->email]), Rule::exists(User::class)
            ],
        ];
    }

    /**
     * @return void
     */
    public function sendAnInvitationLetter(): void
    {
        $attributes = $this->validated();
        $attributes['status'] = StatusEnum::SENT;

        $object = $this->route('project')->invitations()->make($attributes);
        $object->save();

        try {
            $object->sendAnInvitationLetter();
        }
        catch (Throwable) {
            throw ValidationException::withMessages([
                'email' => __('Упс... Не удалось отправить письмо с приглашением в проект.')]);
        }
    }
}
