<?php

namespace App\Containers\Timer\Models;


use BenSampo\Enum\Enum;

final class TimerState extends Enum{

    const Draft = 0;
    const Start = 1;
    const OnHold = 2;
    const Stop = 3;

}
