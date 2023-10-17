<?php

namespace App\Models;

use App\Enums\Task\StatusEnum;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Stephenjude\DefaultModelSorting\Traits\DefaultOrderBy;

/**
 * App\Models\Task
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \BenSampo\Enum\Enum|null $status
 * @property \Illuminate\Support\Carbon|null $tracker
 * @property int $execution_time
 * @property int $project_id
 * @property int $executor_id
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $executor
 * @method static Builder|Task completed()
 * @method static Builder|Task newModelQuery()
 * @method static Builder|Task newQuery()
 * @method static Builder|Task query()
 * @method static Builder|Task whereCreatedAt($value)
 * @method static Builder|Task whereCreatedBy($value)
 * @method static Builder|Task whereDescription($value)
 * @method static Builder|Task whereExecutionTime($value)
 * @method static Builder|Task whereExecutorId($value)
 * @method static Builder|Task whereId($value)
 * @method static Builder|Task whereProjectId($value)
 * @method static Builder|Task whereStatus($value)
 * @method static Builder|Task whereTitle($value)
 * @method static Builder|Task whereTracker($value)
 * @method static Builder|Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    /**
     *
     */
    use DefaultOrderBy;

    /**
     * @var array
     */
    protected $casts = ['tracker' => 'datetime', 'status' => StatusEnum::class];

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
    public function project(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function executor(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'executor_id');
    }

    /**
     * @param Builder $builder
     * @return void
     */
    public function scopeCompleted(Builder $builder): void
    {
        $builder->where('status', StatusEnum::COMPLETED);
    }

    /**
     * Актуальное время выполнения задачи в человеко-понятном виде.
     *
     * @return string
     * @throws \Exception
     */
    public function currentExecutionTime(): string
    {
        return ($time = $this->execution_time + $this->sinceTheTrackerWasLaunched()) ? CarbonInterval::second($time)->forHumans() : (string) __('0 секунд');
    }

    /**
     * Сколько прошло секунд с момента запуска трекера.
     *
     * @return float|int
     */
    public function sinceTheTrackerWasLaunched(): float|int
    {
        return now()->diffInSeconds($this->tracker);
    }
}
