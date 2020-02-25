<?php

namespace App\Containers\WorkIncapacity\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class WorkIncapacityRepository
 */
class WorkIncapacityRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
