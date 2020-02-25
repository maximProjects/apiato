<?php


namespace App\Containers\Deviation\Models;

use BenSampo\Enum\Enum;

final class DeviationType extends Enum
{

    const HSE = 1;

    const QA = 2;

    const ChangeOrder = 2;

    const SI = 3;
}
