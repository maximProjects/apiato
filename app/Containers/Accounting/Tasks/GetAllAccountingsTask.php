<?php

namespace App\Containers\Accounting\Tasks;

use App\Containers\Accounting\Data\Repositories\AccountingRepository;
use App\Containers\TimeRegistry\Data\Repositories\TimeRegistryRepository;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Criterias\Eloquent\ThisLessDatesCriteria;
use App\Ship\Criterias\Eloquent\ThisMoreDatesCriteria;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
class GetAllAccountingsTask extends Task
{

    protected $repository;

    public function __construct(TimeRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($params)
    {
        /*
            "project_id",
            "project_group_id",
            "date_start",
            "date_end",
         */
        if(isset($params['project_id'])) {
            $this->repository->pushCriteria(new ThisEqualThatCriteria('project_id', $params['project_id']));
        }

        if(isset($params['project_group_id'])) {
            $this->repository->pushCriteria(new ThisEqualThatCriteria('project_group_id', $params['project_group_id']));
        }

        if(isset($params['date_start'])) {
            $d = Carbon::createFromFormat('Y-m-d', $params['date_start']);
           $this->repository->pushCriteria(new ThisLessDatesCriteria('date_start', $d));
        }

        if(isset($params['date_end'])) {
            $d = Carbon::createFromFormat('Y-m-d', $params['date_end']);
            $this->repository->pushCriteria(new ThisMoreDatesCriteria('date_end', $d));
        }

        return $this->repository->paginate();
    }
}
