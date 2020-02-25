<?php

namespace App\Containers\Schedule\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ScheduleRepository
 */
class ScheduleRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
