<?php

namespace App\Containers\Report\Tasks;

use App\Containers\Project\Models\Project;
use App\Containers\Schedule\Models\Schedule;
use App\Containers\TimeRegistry\Models\TimeRegistryState;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Exception;
use hanneskod\classtools\Iterator\Filter\WhereFilter;

class ProjectReportTask extends Task
{

    protected $repository;

    public function __construct()
    {

    }

    public function run(Project $project)
    {
        try {
            $result = [
              'total_sum' => 0,
              'time' => 0,
              'extra_time' => 0,
              'total_time' => 0,
              'activeUsers' => 0,
              'scheduleUser' => 0
            ];
            $timeRegistries = $project->timeRegistries()->get();
            $result["scheduleUser"] = $project->schedules()->where("date_start", "<=", Carbon::now())->where("date_end", ">=", Carbon::now())->count();


            foreach ($timeRegistries as $timeRegister)
            {
                $timeRegisterReport = $timeRegister->report();
                $result['total_sum'] = $result['total_sum'] + $timeRegisterReport['sum'];
                $result['time'] = $result['time'] + $timeRegisterReport['time'];
                $result['extra_time'] = $result['extra_time'] + $timeRegisterReport['extra_time'];

                if($timeRegister->state_id == TimeRegistryState::Active)
                {
                    $result['activeUsers']++;
                }
            }

            $result['total_time'] = $result['time'] + $result['extra_time'];

            return $result;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
