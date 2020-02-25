<?php

namespace App\Containers\Job\Tasks;

use App\Containers\Job\Data\Repositories\JobTypeRepository;
use App\Containers\Job\Models\JobTypeState;
use App\Ship\Criterias\Eloquent\ThisNotEqualThatCriteria;
use App\Ship\Parents\Tasks\Task;
use PhpParser\Node\Expr\BinaryOp\NotEqual;

class GetAllJobTypesTask extends Task
{

    protected $repository;

    public function __construct(JobTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($params)
    {
        $state_id = JobTypeState::Draft;
        if(isset($params['state_id'])) {
            $state_id = $params['state_id'];
            $this->repository->pushCriteria(new ThisNotEqualThatCriteria('state_id', $state_id));
        }
        return $this->repository->paginate();
    }
}
