<?php


namespace App\Containers\Checklist\Models;

use BenSampo\Enum\Enum;

final class ChecklistType extends Enum
{
    const SystemTemplate = 0;
    const UserTemplate = 1;
}
