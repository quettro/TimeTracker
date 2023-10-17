<?php

namespace App\Models;

use App\Enums\Invitation\StatusEnum;
use App\Mail\InvitationMail;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Stephenjude\DefaultModelSorting\Traits\DefaultOrderBy;

/**
 * App\Models\Invitation
 *
 * @property int $id
 * @property string $email
 * @property string $token
 * @property \BenSampo\Enum\Enum|null $status
 * @property int $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Project|null $project
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Invitation extends Model
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
    public function project(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    /**
     * @return string
     */
    public function newToken(): string
    {
        return (string) Str::uuid();
    }

    /**
     * @return bool
     */
    public function tokenExpired(): bool
    {
        return $this->created_at->add($this->tokenValidityPeriod())->isPast();
    }

    /**
     * @return CarbonInterval
     */
    public function tokenValidityPeriod(): CarbonInterval
    {
        return CarbonInterval::minute(15);
    }

    /**
     * @return void
     */
    public function sendAnInvitationLetter(): void
    {
        Mail::to($this->email)->send(new InvitationMail($this));
    }
}
