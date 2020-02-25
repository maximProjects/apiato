<?php

namespace App\Containers\Timer\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class TimerRepository
 */
class TimerRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
