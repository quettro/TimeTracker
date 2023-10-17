<?php

namespace App\Models;

use App\Enums\Project\StatusEnum;
use Illuminate\Support\Facades\Auth;
use Stephenjude\DefaultModelSorting\Traits\DefaultOrderBy;

/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \BenSampo\Enum\Enum|null $status
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $createdBy
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Project extends Model
{
    /**
     *
     */
    use DefaultOrderBy;

    /**
     * @var array
     */
    protected $casts = ['status' => StatusEnum::class];

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    protected static string $orderByColumn = 'id';

    /**
     * @var string
     */
    protected static string $orderByColumnDirection = 'desc';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function createdBy(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    /**
     * @param User $user
     * @return bool
     */
    public function hasAccessToManagement(User $user): bool
    {
        return $this->createdBy->is($user);
    }

    /**
     * @param $query
     * @param $value
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resolveRouteBindingQueryR($query, $value): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return Auth::user()->availableProjects()->where($this->getRouteKeyName(), $value);
    }
}
