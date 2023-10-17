<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
            'name' => __('Имя пользователя'),
            'email' => __('Адрес электронной почты'),
            'password' => __('Пароль'),
            'password_confirmation' => __('Повторный пароль'),
            'agree' => __('Пользовательское соглашение'),
        ];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required', 'string', 'max:255', 'alpha_dash:ascii', 'unique:' . User::class
            ],
            'email' => [
                'required', 'string', 'email', 'max:255', 'unique:' . User::class
            ],
            'password' => [
                'required', 'confirmed', Rules\Password::defaults()
            ],
            'agree' => [
                'accepted', 'exclude'
            ],
        ];
    }
}
