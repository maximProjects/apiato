<?php

namespace App\Containers\Manager\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ManagerRepository
 */
class ManagerRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
