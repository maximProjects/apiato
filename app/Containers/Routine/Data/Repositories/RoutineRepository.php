<?php

namespace App\Containers\Routine\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class RoutineRepository
 */
class RoutineRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
