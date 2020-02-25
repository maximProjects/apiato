<?php


namespace App\Containers\Deviation\Models;

use BenSampo\Enum\Enum;

final class DeviationState extends Enum
{
    const Draft = 0;
    const New = 1;
    const Active = 2;
    const Finished = 3;
}
