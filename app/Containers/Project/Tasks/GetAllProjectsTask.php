<?php

namespace App\Containers\Project\Tasks;

use App\Containers\Project\Data\Criterias\ProjectFilterClientCriteria;
use App\Containers\Project\Data\Criterias\ProjectFilterDateEndCriteria;
use App\Containers\Project\Data\Criterias\ProjectFilterDateStartCriteria;
use App\Containers\Project\Data\Criterias\ProjectFilterStateCriteria;
use App\Containers\Project\Data\Repositories\ProjectRepository;
use App\Containers\Project\Models\Project;
use App\Ship\Criterias\Eloquent\OrderByFieldCriteria;
use App\Ship\Criterias\Eloquent\OrderByUpdateDateAscendingCriteria;
use App\Ship\Criterias\Eloquent\OrderByUpdateDateDescendingCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllProjectsTask extends Task
{

    protected $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($params)
    {
        if(isset($params['order_by_name'])) {
            $this->repository->pushCriteria(new OrderByFieldCriteria('name', $params['order_by_name']));
        }
        if(isset($params['date_start'])) {
            $this->repository->pushCriteria(new ProjectFilterDateStartCriteria($params['date_start']));
        }
        if(isset($params['date_end'])) {
            $this->repository->pushCriteria(new ProjectFilterDateEndCriteria($params['date_end']));
        }
        if(isset($params['state_id'])) {
            $this->repository->pushCriteria(new ProjectFilterStateCriteria($params['state_id']));
        }
        if(isset($params['client_id'])) {
            $this->repository->pushCriteria(new ProjectFilterClientCriteria($params['client_id']));
        }


        return $this->repository->paginate();
    }
}
