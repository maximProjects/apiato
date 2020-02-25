<?php

namespace App\Containers\Balance\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class MontlyBalanceRepository
 */
class MonthlyBalanceRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
