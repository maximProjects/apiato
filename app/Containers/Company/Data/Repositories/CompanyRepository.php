<?php

namespace App\Containers\Company\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CompanyRepository
 */
class CompanyRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
