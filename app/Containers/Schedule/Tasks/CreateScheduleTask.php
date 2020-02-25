<?php

namespace App\Containers\Schedule\Tasks;

use App\Containers\Project\Models\Project;
use App\Containers\Project\Models\ProjectGroup;
use App\Containers\Schedule\Data\Repositories\ScheduleRepository;
use App\Containers\Schedule\Models\Schedule;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Exception;

class CreateScheduleTask extends Task
{

    protected $repository;

    public function __construct(ScheduleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {


        $includeDays = [];
        if(isset($data["include_snd"])) {
            if($data["include_snd"] == 1) {
                $includeDays[] = 0;
            }
        }


        if(isset($data["include_strd"])) {
            if($data["include_strd"] == 1) {
                $includeDays[] = 6;
            }
        }

      //  $data = $data['schedule'];
        try {

            $result = array();
            $dateStart = new Carbon($data['date_start']);

            $dateEnd = new Carbon($data['date_end']);

            $dif = $dateStart->diffInDays($dateEnd);


            if($dif == 0) {
                $r = $this->writeToSceduler($data, $dateStart, $dateEnd, [6,0]);
                if($r) {
                    $result[] = $r;
                }
            }

            if($dif == 1) {
                // one day
                $start = new Carbon($data['date_start']);
                $stop = new Carbon($data['date_start']);
                $stop = $stop->setTime(17,0,0);

                $r = $this->writeToSceduler($data, $start, $stop, $includeDays);
                if($r) {
                    $result[] = $r;
                }

                $start = new Carbon($data['date_end']);
                $start->setTime(8,0,0);
                $stop = new Carbon($data['date_end']);
                $r = $this->writeToSceduler($data, $start, $stop, $includeDays);
                if($r) {
                    $result[] = $r;
                }

            }
            // if more than one day
            if($dif >1) {
                $i = 1;

                // write start day with start time
                $start = new Carbon($data['date_start']);
                $stop = new Carbon($data['date_start']);
                $stop = $stop->setTime(17,0,0);
                $r = $this->writeToSceduler($data, $start, $stop, $includeDays);
                if($r) {
                    $result[] = $r;
                }
                while($i < $dif) {
                    // write interval days
                    $intervalStart = new Carbon($data['date_start']);
                    $intervalStart->addDays($i);
                    $intervalStart = $intervalStart->setTime(8,0,0);
                    $intervalStop = new Carbon($data['date_start']);
                    $intervalStop->addDays($i);
                    $intervalStop = $intervalStop->setTime(17,0,0);
                    $r = $this->writeToSceduler($data, $intervalStart, $intervalStop, $includeDays);
                    if($r) {
                        $result[] = $r;
                    }
                    $i++;
                }
                // write end day with end time
                $start = new Carbon($data['date_end']);
                $start->setTime(8,0,0);
                $stop = new Carbon($data['date_end']);
                $r = $this->writeToSceduler($data, $start, $stop, $includeDays);
                if($r) {
                    $result[] = $r;
                }
            }

            return $result;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }

    public function writeToSceduler($data, $start, $stop, $includeDays = [])
    {

        $wk = $start->dayOfWeek;

        if( ($wk != 0 || in_array(0, $includeDays) )  && ($wk != 6 || in_array(6, $includeDays))) {
            if (isset($data['project_id'])) {

                $project = Project::find($data['project_id']);
                //$newSchedule = $this->repository->create(['user_id' => 1, 'date_start' => $start, 'date_end' => $stop]);
                $project->schedules()->create(['user_id' => $data['user_id'], 'date_start' => $start, 'date_end' => $stop]);

            }
            if (isset($data['project_group_id'])) {
                $projectGroup = ProjectGroup::find($data['project_group_id']);
                $projectGroup->schedules()->create(['user_id' => $data['user_id'], 'date_start' => $start, 'date_end' => $stop]);
            }
            $schedule = Schedule::orderBy('id', 'desc')->first();
        } else {
            $schedule = false;
        }
        return $schedule;
    }
}
