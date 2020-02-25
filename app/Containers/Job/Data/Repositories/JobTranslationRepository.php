<?php

namespace App\Containers\Job\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class JobTranslationRepository
 */
class JobTranslationRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
