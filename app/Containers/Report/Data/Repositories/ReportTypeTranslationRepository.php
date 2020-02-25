<?php

namespace App\Containers\Report\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ReportTypeTranslationRepository
 */
class ReportTypeTranslationRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
