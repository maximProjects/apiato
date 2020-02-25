<?php

namespace App\Containers\Confirmation\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ConfirmationRepository
 */
class ConfirmationRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
