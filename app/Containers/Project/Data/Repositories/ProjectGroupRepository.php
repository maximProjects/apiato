<?php

namespace App\Containers\Project\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ProjectGroupRepository
 */
class ProjectGroupRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
        'state_id' => '=',
        // ...
    ];

}
