<?php

namespace App\Containers\Project\Models;


use BenSampo\Enum\Enum;

final class ExpenseDocumentType extends Enum{

    const All = 0;
    const Order = 1;
    const Invoice = 2;

}