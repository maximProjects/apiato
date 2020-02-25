<?php

namespace App\Containers\TimeRegistry\Models;


use BenSampo\Enum\Enum;

final class TimeRegistryState extends Enum{

    const Draft = 0;
    const New = 1;
    const Active = 2;
    const Offline = 3;
    const OnHold = 4;
    const Finished = 5;

}
