<?php

namespace App\Containers\Discrepancy\Models;


use BenSampo\Enum\Enum;

final class DiscrepancyType extends Enum{

    const HSE = 1;

    const QA = 2;

    const ChangeOrder = 2;

    const SI = 3;

}