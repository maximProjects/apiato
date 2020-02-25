<?php

namespace App\Containers\Project\Models;


use BenSampo\Enum\Enum;

final class ExpenseState extends Enum{

    const Draft = 0;
    const New   = 1;
    const Finished  = 2;

}