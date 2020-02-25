<?php

namespace App\Containers\ResourcePlan\Tasks;

use App\Containers\Project\Models\Project;
use App\Containers\Project\Models\ProjectGroup;
use App\Containers\ResourcePlan\Data\Repositories\ResourcePlanRepository;
use App\Containers\ResourcePlan\Models\ResourcePlan;
use App\Containers\Schedule\Models\Schedule;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Exception;

class CreateResourcePlanTask extends Task
{

    protected $repository;

    public function __construct(ResourcePlanRepository $repository)
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

        if(!isset($data['date_start'])) {
            $data['date_start'] = $data['date_end'];
        }

        if(!isset($data['date_end'])) {
            $data['date_end'] = $data['date_start'];
        }

        //  $data = $data['schedule'];
        try {

            $result = array();
            $dateStart = new Carbon($data['date_start']);

            $dateEnd = new Carbon($data['date_end']);

            $dif = $dateStart->diffInDays($dateEnd);


            if($dif == 0) {
                $r = $this->writeToResourcePlan($data, $dateStart, $dateEnd, [6,0]);
                if($r) {
                    $result[] = $r;
                }
            }

            if($dif == 1) {
                // one day
                $start = new Carbon($data['date_start']);
                $stop = new Carbon($data['date_start']);
                $stop = $stop->setTime(17,0,0);

                $r = $this->writeToResourcePlan($data, $start, $stop, $includeDays);
                if($r) {
                    $result[] = $r;
                }

                $start = new Carbon($data['date_end']);
                $start->setTime(8,0,0);
                $stop = new Carbon($data['date_end']);
                $r = $this->writeToResourcePlan($data, $start, $stop, $includeDays);
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
                $r = $this->writeToResourcePlan($data, $start, $stop, $includeDays);
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
                    $r = $this->writeToResourcePlan($data, $intervalStart, $intervalStop, $includeDays);
                    if($r) {
                        $result[] = $r;
                    }
                    $i++;
                }
                // write end day with end time
                $start = new Carbon($data['date_end']);
                $start->setTime(8,0,0);
                $stop = new Carbon($data['date_end']);
                $r = $this->writeToResourcePlan($data, $start, $stop, $includeDays);
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

    public function writeToResourcePlan($data, $start, $stop, $includeDays = [])
    {

        $wk = $start->dayOfWeek;

        if( ($wk != 0 || in_array(0, $includeDays) )  && ($wk != 6 || in_array(6, $includeDays))) {


                $project = Project::find($data['project_id']);
                //$newSchedule = $this->repository->create(['user_id' => 1, 'date_start' => $start, 'date_end' => $stop]);
            //$where_q[] = ['date_end', '<=', new \Illuminate\Support\Carbon($params['date_end'])];
                $rp = ResourcePlan::where([['date_start', '=', new \Illuminate\Support\Carbon($start)], ['project_id', '=', $data['project_id']]])->first();
                if($rp) {
                    $resourcePlan = $this->repository->update(['project_id' => $data['project_id'], 'number_employees_required' => $data['number_employees_required'], 'date_start' => $start, 'date_end' => $stop], $rp->id);
                } else {
                    $resourcePlan = $this->repository->create(['project_id' => $data['project_id'], 'number_employees_required' => $data['number_employees_required'], 'date_start' => $start, 'date_end' => $stop]);
                }

        } else {
            $resourcePlan = false;
        }
        return $resourcePlan;
    }
}
