<?php


namespace App\Containers\Discrepancy\Models;

use BenSampo\Enum\Enum;

final class DiscrepancyState extends Enum
{
    const Draft = 0;
    const New = 1;
    const Active = 2;
    const Finished = 3;
}
