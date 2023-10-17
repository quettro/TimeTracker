<?php

namespace App\Http\Requests\Authorized\ProjectTask;

use App\Enums\Task\StatusEnum;
use App\Models\ProjectUser;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'title' => __('Заголовок'),
            'description' => __('Текстовое описание'),
            'executor_id' => __('Исполнитель'),
            'status' => __('Статус'),
        ];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required', 'string', 'max:255'
            ],
            'description' => [
                'required', 'string', 'max:255'
            ],
            'executor_id' => [
                'required', 'integer', Rule::exists(ProjectUser::class, 'user_id')->where('project_id', $this->route('project')->id)
            ],
            'status' => [
                'required', 'integer', new EnumValue(StatusEnum::class, false)
            ],
        ];
    }
}
