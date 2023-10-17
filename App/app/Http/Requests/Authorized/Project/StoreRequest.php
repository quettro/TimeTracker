<?php

namespace App\Http\Requests\Authorized\Project;

use App\Enums\Project\StatusEnum;
use BenSampo\Enum\Rules\EnumValue;

class StoreRequest extends Request
{
    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'name' => __('Наименование'),
            'description' => __('Текстовое описание'),
            'status' => __('Статус'),
        ];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required', 'string', 'max:255'
            ],
            'description' => [
                'nullable', 'string', 'max:255'
            ],
            'status' => [
                'required', 'integer', new EnumValue(StatusEnum::class, false)
            ],
        ];
    }
}
