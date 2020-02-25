<?php


namespace App\Containers\Checklist\Models;

use BenSampo\Enum\Enum;

final class ChecklistState extends Enum
{
    const Draft = 0;
    const New   = 1;
    const Processing   = 2;
    const Finished   = 3;
}
