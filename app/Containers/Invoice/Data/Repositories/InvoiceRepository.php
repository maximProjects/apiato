<?php

namespace App\Containers\Invoice\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class InvoiceRepository
 */
class InvoiceRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
