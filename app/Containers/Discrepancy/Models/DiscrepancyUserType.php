<?php

namespace App\Containers\Discrepancy\Models;


use BenSampo\Enum\Enum;

final class DiscrepancyUserType extends Enum{

    const AssignedTo = 1;
    const CreatedBy = 2;

}