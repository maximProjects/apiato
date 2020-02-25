<?php

namespace App\Containers\Schedule\Tasks;

use App\Containers\Project\Models\Project;
use App\Containers\Schedule\Data\Repositories\ScheduleRepository;
use App\Containers\Schedule\Models\Schedule;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Exception;

class CreateProjectScheduleTask extends Task
{

    protected $repository;

    public function __construct(ScheduleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {

            $schedulesOld = Schedule::whereDate('date_start', '=', $data['date'])->get();
            foreach ($schedulesOld as $sOld) {
                $sOld->delete();
            }
            $project = Project::find($data["project_id"]);
            $start = new Carbon($data['date']);
            $stop = new Carbon($data['date']);
            $start->setTime(8,0,0);
            $stop->setTime(17,0,0);
            $schedules = [];
            if(isset($data["users"])) {
                foreach ($data["users"] as $uId) {
                    $sData = [
                        "user_id" => $uId,
                        "date_start" => $start,
                        "date_end" => $stop
                    ];
                    $schedules = $project->schedules()->create($sData);
                }
            }
            return $schedules;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
