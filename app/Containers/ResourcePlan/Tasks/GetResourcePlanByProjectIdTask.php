<?php

namespace App\Containers\ResourcePlan\Tasks;

use App\Containers\Project\Data\Repositories\ProjectRepository;
use App\Containers\Project\Models\Project;
use App\Containers\ResourcePlan\Data\Repositories\ResourcePlanRepository;
use App\Containers\Schedule\Models\Schedule;
use App\Containers\User\Models\User;
use App\Containers\WorkIncapacity\Models\WorkIncapacity;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Carbon\Carbon;

class GetResourcePlanByProjectIdTask extends Task
{

    protected $repository;

    public function __construct(ResourcePlanRepository $repository, ProjectRepository $projectRepository)
    {
        $this->repository = $repository;
        $this->projectRepository = $projectRepository;
    }

    public function run($params)
    {
        try {
            $params['project_id'] = $params['id'];
            $result = [];
            $project = $this->projectRepository->with(array('resourcePlans' => function($query) use ($params)
            {
                if(isset($params['date'])) {
                    $query->whereDate('date_start', '=', new Carbon($params['date']));
                }
            },
                'schedules' => function($query) use ($params)
                {
                    if(isset($params['date'])) {
                        $query->with('user')->whereDate('date_start', '=', new Carbon($params['date']));
                    }
                }
            ))->find($params['project_id'])->toArray();

            $result['project'] = [];
            $result['project']['id'] = $project['id'];
            $result['project']['name'] = $project['name'];
            $result['project']['assigned_users'] = [];
            $emplProjectIds = [];

            foreach ($project['schedules'] as $sch) {
                $result['project']['assigned_users'][] = $sch['user'];
                $emplProjectIds[] = $sch['user']['id'];
            }

            $roleName = "employee";

            $unsigned_employees = User::whereHas('roles', function ($q) use ($roleName) {
                $q->where('name', $roleName);
            })->whereNotIn('id', $emplProjectIds)->get()->toArray();


            $result['available_users'] = $unsigned_employees;


            //get other projects

            $projects = Project::with(array('schedules' => function($query) use ($params)
            {
                if(isset($params['date'])) {
                    $query->with('user')->whereDate('date_start', '=', new Carbon($params['date']));
                }
            }
            ))->where('id', '<>', $params['project_id'])->get()->toArray();

            $result['projects'] = [];

            foreach($projects as $p_key => $project) {
                $result['projects'][$p_key]['id'] = $project['id'];
                $result['projects'][$p_key]['name'] = $project['name'];
                $result['projects'][$p_key]['assigned_users'] = [];
                foreach ($project['schedules'] as $sch) {
                    $result['projects'][$p_key]['assigned_users'][] = $sch['user'];
                }
            }


            $result['workIncapacities'] = WorkIncapacity::whereDate('date_start', '<=', new Carbon($params['date']))->whereDate('date_end', '>=', new Carbon($params['date']))->get()->toArray();


            return $result;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
