<?php


namespace App\Containers\Task\Models;

use BenSampo\Enum\Enum;

final class TaskState extends Enum
{
    const Draft = 0;
    const New   = 1;
    const Processing   = 2;
    const Finished   = 3;
}
