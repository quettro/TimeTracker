<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class NewPasswordRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'token' => __('Токен'),
            'email' => __('Адрес электронной почты'),
            'password' => __('Пароль'),
            'password_confirmation' => __('Повторный пароль'),
        ];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'token' => [
                'required'
            ],
            'email' => [
                'required', 'email'
            ],
            'password' => [
                'required', 'confirmed', Rules\Password::defaults()
            ],
        ];
    }
}
