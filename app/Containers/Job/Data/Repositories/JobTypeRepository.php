<?php

namespace App\Containers\Job\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class JobTypeRepository
 */
class JobTypeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
