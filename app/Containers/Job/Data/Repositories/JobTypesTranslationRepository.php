<?php

namespace App\Containers\Job\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class JobTypesTranslationRepository
 */
class JobTypesTranslationRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
