<?php

namespace App\Containers\Schedule\Tasks;

use App\Containers\Project\Data\Repositories\ProjectRepository;
use App\Containers\Project\Models\Project;
use App\Containers\Schedule\Data\Repositories\ScheduleRepository;
use App\Containers\User\Models\User;
use App\Containers\WorkIncapacity\Models\WorkIncapacity;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Carbon;

class GetResourcePlanTask extends Task
{

    protected $repository;

    public function __construct(ScheduleRepository $repository, ProjectRepository $projectRepository)
    {
        $this->repository = $repository;
        $this->projectRepository = $projectRepository;
    }

    public function run($params)
    {
        try {
            $result = [];
            $project = $this->projectRepository->with(array('schedules' => function($query) use ($params)
            {
                if(isset($params['date'])) {
                    $query->with('user')->whereDate('date_start', '=', new Carbon($params['date']));
                }
            }
            ))->find($params['project_id'])->toArray();

            $result['project'] = [];
            $result['project']['id'] = $project['id'];
            $result['project']['name'] = $project['name'];
            $result['project']['users'] = [];
            $emplProjectIds = [];
            foreach ($project['schedules'] as $sch) {
                $result['project']['users'][] = $sch['user'];
                $emplProjectIds[] = $sch['user']['id'];
            }
            $roleName = "employee";
            $unsigned_employees = User::whereHas('roles', function ($q) use ($roleName,$emplProjectIds) {
                $q->where('name', $roleName);
                $q->whereNotIn('id', $emplProjectIds);
            })->get()->toArray();

            $result['unsigned_employees'] = $unsigned_employees;


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
                foreach ($project['schedules'] as $sch) {
                    $result['projects'][$p_key]['users'][] = $sch['user'];
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
