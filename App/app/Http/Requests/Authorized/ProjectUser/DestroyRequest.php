<?php

namespace App\Http\Requests\Authorized\ProjectUser;

use App\Http\Requests\Authorized\Project\Request;

class DestroyRequest extends Request
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return parent::authorize() && !$this->route('project')->hasAccessToManagement($this->route('projectUser')->user);
    }
}
