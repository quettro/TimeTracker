<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ForgotYourPasswordRequest extends FormRequest
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
            'email' => __('Адрес электронной почты'),
        ];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required', 'email'
            ],
        ];
    }
}
