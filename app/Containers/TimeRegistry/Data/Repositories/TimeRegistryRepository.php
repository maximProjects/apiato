<?php

namespace App\Containers\TimeRegistry\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class TimeRegistryRepository
 */
class TimeRegistryRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'type_id' => '=',
        // ...
    ];

}
