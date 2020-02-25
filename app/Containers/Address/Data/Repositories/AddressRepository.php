<?php

namespace App\Containers\Address\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AddressRepository
 */
class AddressRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
