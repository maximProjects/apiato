<?php


namespace App\Containers\WorkIncapacity\Models;

use BenSampo\Enum\Enum;

final class WorkIncapacityState extends Enum
{
    const New   = 1;
    const Processing   = 2;
    const Finished   = 3;
}
