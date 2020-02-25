<?php


namespace App\Containers\Checkpoint\Models;

use BenSampo\Enum\Enum;

final class CheckpointState extends Enum
{
    const New   = 1;

    const Processing = 2;

    const Finished = 3;

    const NotAssigned = 4;

    const Assigned = 5;

    const Discrepancy = 6;
}
