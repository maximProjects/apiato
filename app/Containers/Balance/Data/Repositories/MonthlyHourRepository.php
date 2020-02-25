<?php

namespace App\Containers\Balance\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class MonthlHoursRepository
 */
class MonthlyHourRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
