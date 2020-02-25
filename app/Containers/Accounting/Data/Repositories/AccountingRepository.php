<?php

namespace App\Containers\Accounting\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccountingRepository
 */
class AccountingRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
