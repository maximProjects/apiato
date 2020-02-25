<?php

namespace App\Containers\Schedule\Tasks;

use App\Containers\Project\Data\Repositories\ProjectRepository;
use App\Containers\Schedule\Data\Repositories\ScheduleRepository;
use App\Containers\Schedule\Models\Schedule;
use App\Containers\WorkIncapacity\Models\WorkIncapacity;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use App\Containers\User\Models\User;
use Illuminate\Support\Carbon;

class GetResourcePlansTask extends Task
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
            $roleName = "employee";
            $employees = User::whereHas('roles', function ($q) use ($roleName) {
                $q->where('name', $roleName);
            })->count();
            //  get projects array with schedules by date.

            $projects = $this->projectRepository->with(array('schedules' => function($query) use ($params)
                                                                                        {
                                                                                            $where_q = [['id', '<>', 0]];
                                                                                            if(isset($params['date_start'])) {
                                                                                               $where_q[] = ['date_start', '>=', new Carbon($params['date_start'])];
                                                                                            }
                                                                                            if(isset($params['date_end'])) {
                                                                                                $where_q[] = ['date_end', '<=', new Carbon($params['date_end'])];
                                                                                            }
                                                                                            $query->where($where_q);
                                                                                        }
                                                        ))->all();

            $prArr = $projects->toArray();
            $projectsArr = [];
            foreach($prArr as $pr_key => $project) {
                if($project['schedules']) {
                    foreach($project['schedules'] as $sch_key => $sch) {

                        $assigned = Schedule::where([
                            ['date_start', '>=', new Carbon($sch['date_start'])],
                            ['date_end', '<=', new Carbon($sch['date_end'])],
                            ['scheduleable_id', '=', $project['id']]
                        ])->count();

                        $unavailable = Schedule::where([
                            ['date_start', '>=', new Carbon($sch['date_start'])],
                            ['date_end', '<=', new Carbon($sch['date_end'])]
                        ])->count();


                        $workIncapacity = WorkIncapacity::where([
                            ['date_start', '>=', new Carbon($sch['date_start'])],
                            ['date_end', '<=', new Carbon($sch['date_end'])]
                        ])->count();


                        $unavailable += $workIncapacity;
                        $projectsArr[$pr_key]['id'] = $prArr[$pr_key]['id'];
                        $projectsArr[$pr_key]['name'] = $prArr[$pr_key]['name'];
                        $projectsArr[$pr_key]['schedules'] = $prArr[$pr_key]['schedules'];
                        $projectsArr[$pr_key]['schedules'][$sch_key]['assigned'] = $assigned;
                        $projectsArr[$pr_key]['schedules'][$sch_key]['available'] = $employees-$unavailable;
                        $projectsArr[$pr_key]['schedules'][$sch_key]['unavailable'] = $unavailable;


                    }
                }
            }
            return $projectsArr;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }


}
