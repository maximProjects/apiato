<?php

namespace App\Containers\Discrepancy\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class DiscrepancyRepository
 */
class DiscrepancyRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
