<?php

namespace App\Containers\Report\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ReportTypeRepository
 */
class ReportTypeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
