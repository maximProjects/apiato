<?php

namespace App\Containers\Schedule\Tasks;

use App\Containers\Schedule\Data\Repositories\ScheduleRepository;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Criterias\Eloquent\ThisLessDatesCriteria;
use App\Ship\Criterias\Eloquent\ThisMoreDatesCriteria;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Carbon;

class GetAllSchedulesTask extends Task
{

    protected $repository;

    public function __construct(ScheduleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($params)
    {
        if(isset($params['date_start'])) {
            $this->repository->pushCriteria(new ThisMoreDatesCriteria('date_start', new Carbon($params['date_start'])));
        }

        if(isset($params['date_end'])) {
            $this->repository->pushCriteria(new ThisLessDatesCriteria('date_end', new Carbon($params['date_end'])));
        }
        $this->repository->pushCriteria(new ThisEqualThatCriteria('scheduleable_type','App\Containers\Project\Models\Project'));
        if(isset($params['project_id']))
        {
            $this->repository->pushCriteria(new ThisEqualThatCriteria('scheduleable_id', $params['project_id']));

        }


        if(isset($params['project_group_id']))
        {
            $this->repository->pushCriteria(new ThisEqualThatCriteria('scheduleable_id', $params['project_group_id']));
            $this->repository->pushCriteria(new ThisEqualThatCriteria('scheduleable_type','App\Containers\Project\Models\ProjectGroup'));
        }


        $schedules = $this->repository->paginate();
        return $schedules;
    }
}
