<?php

namespace App\Containers\Checkpoint\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CheckpointRepository
 */
class CheckpointRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
