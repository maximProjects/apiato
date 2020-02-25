<?php

namespace App\Containers\Project\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class ProjectFilterDateEndCriteria extends Criteria
{

    private $dateEnd;

    public function __construct($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('date_end', '<=', $this->dateEnd);
    }
}
