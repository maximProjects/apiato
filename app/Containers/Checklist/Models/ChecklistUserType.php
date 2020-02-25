<?php


namespace App\Containers\Checklist\Models;

use BenSampo\Enum\Enum;

final class ChecklistUserType extends Enum
{
    //Responsible person User type
    const Responsible = 1;

    //Contact person User type
    const Contact = 2;
}
