<?php

namespace App\Containers\Deviation\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class DeviationRepository
 */
class DeviationRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
