<?php

namespace App\Http\Requests\Authorized\Project;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return !$this->route('project') || $this->route('project')->hasAccessToManagement($this->user());
    }
}
