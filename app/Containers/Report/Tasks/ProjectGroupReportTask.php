<?php

namespace App\Containers\Report\Tasks;

use App\Containers\Project\Models\ProjectGroup;
use App\Containers\Report\Data\Repositories\ProjectGroupRepository;
use App\Containers\TimeRegistry\Models\TimeRegistryState;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Exception;

class ProjectGroupReportTask extends Task
{

    protected $repository;

    public function __construct()
    {

    }

    public function run(ProjectGroup $projectGroup)
    {
        try {
            $result = [
                'totalSum' => 0,
                'totalTime' => 0,
                'extraTime' => 0,
                'activeUsers' => 0,
                'scheduleUser' => 0
            ];

            $timeRegistries = $projectGroup->timeRegistries()->get();
            $result["scheduleUser"] = $projectGroup->schedules()->where("date_start", "<=", Carbon::now())->where("date_end", ">=", Carbon::now())->count();

            foreach ($timeRegistries as $timeRegister)
            {
                $timeRegisterReport = $timeRegister->report();
                $result['totalSum'] = $result['totalSum'] + $timeRegisterReport['sum'];
                $result['totalTime'] = $result['totalTime'] + $timeRegisterReport['time'];
                $result['extraTime'] = $result['extraTime'] + $timeRegisterReport['extraTime'];
                if($timeRegister->state_id == TimeRegistryState::Active)
                {
                    $result['activeUsers']++;
                }
            }
            return $result;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
