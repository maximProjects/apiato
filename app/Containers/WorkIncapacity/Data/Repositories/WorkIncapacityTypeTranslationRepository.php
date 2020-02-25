<?php

namespace App\Containers\WorkIncapacity\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class WorkIncapacityTypeTranslationRepository
 */
class WorkIncapacityTypeTranslationRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
