<?php

namespace App\Containers\Report\Tasks;

use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Ship\Parents\Tasks\Task;

class TimeRegistryReportTask extends Task
{

    public function __construct()
    {
        // ..
    }

    public function run(TimeRegistry $timeRegistry)
    {
        $time = 0;
        $extra_time = 0;
        $sum = 0;
//      $balances = $timeRegistry->balance()->get();
//      if($balances)
//      {
//        foreach($balances as $bal) {
//          $time = $time + $bal->hours;
//          $extra_time = $extra_time + $bal->hours;
//          $sum= $sum + $bal->sum;
//        }
//      }

        foreach($timeRegistry->jobs()->get() as $job) {

            $time = $time + $job->getTime();
            $extra_time = $extra_time + $job->extra_time;
            if(!empty($job->fixed_ammount)) {
                $totalSum = $sum + $job->fixed_ammount;
            } else {
                $h = $job->getTime() / 3600;
                $sum = $sum + $h*$job->hourly_rate;
            }
        }

        $result = [
          'time' => $time,
          'extra_time' => $extra_time,
            'total_time' => $time+$extra_time,
            'sum' => $sum,
        ];

        return $result;
    }
}
