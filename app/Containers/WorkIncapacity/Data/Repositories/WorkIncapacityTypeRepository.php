<?php

namespace App\Containers\WorkIncapacity\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class WorkIncapacityTypeRepository
 */
class WorkIncapacityTypeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
