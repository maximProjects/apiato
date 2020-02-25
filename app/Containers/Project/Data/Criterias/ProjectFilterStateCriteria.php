<?php

namespace App\Containers\Project\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class ProjectFilterStateCriteria extends Criteria
{

    private $stateId;

    public function __construct($stateId)
    {
        $this->stateId = $stateId;
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('state_id', '<=', $this->stateId);
    }
}
