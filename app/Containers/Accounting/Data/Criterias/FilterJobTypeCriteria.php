<?php

namespace App\Containers\Accounting\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class FilterJobTypeCriteria extends Criteria
{

    private $jobTypeId;

    public function __construct($jobTypeId)
    {
        $this->jobTypeId = $jobTypeId;
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        //return $model->where('client_id', '=', $this->clientId);
        $jobTypeId = $this->jobTypeId;
        return $model->whereHas('jobTypes', function($q) use ($jobTypeId) { $q->where('job_type_id','=', $jobTypeId); });
    }
}
