<?php

namespace App\Containers\Project\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class ProjectFilterDateStartCriteria extends Criteria
{

    private $dateStart;

    public function __construct($dateStart)
    {
        $this->dateStart = $dateStart;
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('date_start', '>=', $this->dateStart);
    }
}
