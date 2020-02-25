<?php

namespace App\Containers\Checklist\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class ChecklistRootElementCriteria extends Criteria
{

    private $dateStart;

    public function __construct($parentId)
    {
        $this->parentId = $parentId;
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('parent_id', '=', $this->parentId);
    }
}
