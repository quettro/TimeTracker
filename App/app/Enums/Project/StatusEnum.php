<?php declare(strict_types=1);

namespace App\Enums\Project;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class StatusEnum extends Enum implements LocalizedEnum
{
    const IDEA = 0;

    const IN_PROGRESS = 1;

    const COMPLETED = 2;
}
