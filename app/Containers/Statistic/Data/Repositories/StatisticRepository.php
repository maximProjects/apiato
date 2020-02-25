<?php

namespace App\Containers\Statistic\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class StatisticRepository
 */
class StatisticRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
