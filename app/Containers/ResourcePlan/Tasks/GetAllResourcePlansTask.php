<?php

namespace App\Containers\ResourcePlan\Tasks;

use App\Containers\Project\Data\Repositories\ProjectRepository;
use App\Containers\Project\Models\Project;
use App\Containers\ResourcePlan\Data\Repositories\ResourcePlanRepository;
use App\Containers\Schedule\Data\Repositories\ScheduleRepository;
use App\Containers\Schedule\Models\Schedule;
use App\Containers\User\Models\User;
use App\Containers\WorkIncapacity\Models\WorkIncapacity;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Carbon;

class GetAllResourcePlansTask extends Task
{

    protected $repository;

    public function __construct(ResourcePlanRepository $repository, ProjectRepository $projectRepository, ScheduleRepository $scheduleRepository)
    {
        $this->repository = $repository;
        $this->projectRepository = $projectRepository;
        $this->scheduleRepository = $scheduleRepository;

    }

    public function run($params)
    {
        $result = [];
        $roleName = "employee";


        $employees = User::whereHas('roles', function ($q) use ($roleName) {
            $q->where('name', $roleName);
        })->count();
        if(isset($params['project_id'])) {
            $projects = Project::where('id','=', $params['project_id'])->with(array('resourcePlans' => function ($query) use ($params) {
                $where_q = [['id', '<>', 0]];
                if (isset($params['date_start'])) {
                    $where_q[] = ['date_start', '>=', new Carbon($params['date_start'])];
                }
                if (isset($params['date_end'])) {
                    $where_q[] = ['date_end', '<=', new Carbon($params['date_end'])];
                }
                $query->where($where_q);
            }
            ))->get();
        } else {
            $projects = $this->projectRepository->with(array('resourcePlans' => function ($query) use ($params) {
                $where_q = [['id', '<>', 0]];
                if (isset($params['date_start'])) {
                    $where_q[] = ['date_start', '>=', new Carbon($params['date_start'])];
                }
                if (isset($params['date_end'])) {
                    $where_q[] = ['date_end', '<=', new Carbon($params['date_end'])];
                }
                $query->where($where_q);
            }
            ))->all();
        }
        $prArr = $projects->toArray();
        $resourcePlans = [];
        foreach($prArr as $pr_key => $project) {
            if ($project['resource_plans']) {
                foreach ($project['resource_plans'] as $rp_key => $rp) {

                    $assigned = Schedule::where([
                        ['scheduleable_id', '=', $project['id']]
                    ])->count();

                    $unavailable = Schedule::whereDate('date_start', '=', new \Carbon\Carbon($rp['date_start']))->count();


                    $workIncapacity = WorkIncapacity::whereDate('date_start', '=', new \Carbon\Carbon($rp['date_start']))->count();

                    $prArr[$pr_key]['resource_plans'][$rp_key]['schedule_assigned_users'] = $assigned;
                    $prArr[$pr_key]['resource_plans'][$rp_key]['unavailable'] = $unavailable;
                    $prArr[$pr_key]['resource_plans'][$rp_key]['work_incapacity'] = $workIncapacity;
                    $prArr[$pr_key]['resource_plans'][$rp_key]['available_users'] = $available_users;
                    $resourcePlans[] = $prArr[$pr_key]['resource_plans'][$rp_key];

                }
            }
        }


        return $resourcePlans;
    }
}
