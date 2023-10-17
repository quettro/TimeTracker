<?php declare(strict_types=1);

namespace App\Enums\Invitation;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class StatusEnum extends Enum implements LocalizedEnum
{
    const SENT = 0;

    const ACCEPTED = 1;

    const REJECTED = 2;
}
