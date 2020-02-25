<?php

namespace App\Containers\Document\Data\Repositories;

use App\Containers\Media\Models\Media;
use App\Ship\Parents\Repositories\Repository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class DocumentRepository
 */
class DocumentRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
