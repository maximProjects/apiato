<?php


namespace App\Containers\Task\Models;

use BenSampo\Enum\Enum;

final class TaskPriority extends Enum
{
    const Low   = 1;
    const Medium   = 2;
    const Hight   = 3;
}
