<?php

namespace App\Containers\ResourcePlan\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ResourcePlanRepository
 */
class ResourcePlanRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
