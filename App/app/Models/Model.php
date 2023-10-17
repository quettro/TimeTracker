<?php

namespace App\Models;

use Illuminate\Support\Str;

/**
 * App\Models\Model
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model query()
 * @mixin \Eloquent
 */
class Model extends \Illuminate\Database\Eloquent\Model
{
    /**
     * @param $query
     * @param $value
     * @param $field
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function resolveRouteBindingQuery($query, $value, $field = null)
    {
        $method = 'resolveRouteBindingQuery' . Str::studly($field);

        if ($field && method_exists($this, $method))
            return $this->{$method}($query, $value);

        return parent::resolveRouteBindingQuery($query, $value, $field);
    }
}
