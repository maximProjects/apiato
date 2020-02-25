<?php


namespace App\Containers\Routine\Models;

use BenSampo\Enum\Enum;

final class RoutinetState extends Enum
{
    const New   = 1;
    const Processing   = 2;
    const Finished   = 3;
}
