<?php

namespace App\Containers\Balance\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class BalanceRepository
 */
class BalanceRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
