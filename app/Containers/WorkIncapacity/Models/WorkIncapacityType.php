<?php


namespace App\Containers\WorkIncapacity\Models;

use BenSampo\Enum\Enum;

final class WorkIncapacityType extends Enum
{
    const Processing   = 1;
    const Sick   = 2;
}
