<?php

namespace App\Containers\Job\Models;


use BenSampo\Enum\Enum;

final class JobState extends Enum{

    const New = 0;
    const Processing = 1;
    const OnHold = 1;
    const Finished = 3;

}
