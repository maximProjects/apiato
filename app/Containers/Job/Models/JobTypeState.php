<?php

namespace App\Containers\Job\Models;


use BenSampo\Enum\Enum;

final class JobTypeState extends Enum{
    const Draft = 0;
    const New   = 1;
    const Processing   = 2;
    const Finished   = 3;
}