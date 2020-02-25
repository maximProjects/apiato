<?php


namespace App\Containers\Task\Models;

use BenSampo\Enum\Enum;

final class TaskUserType extends Enum
{
    //Responsible person User type
    const Responsible = 1;

    //Contact person User type
    const Contact = 2;
}
