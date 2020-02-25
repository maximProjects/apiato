<?php

namespace App\Containers\TimeRegistry\Data\Repositories;

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
