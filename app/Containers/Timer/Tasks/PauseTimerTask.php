<?php

namespace App\Containers\Timer\Tasks;

use App\Containers\Timer\Data\Repositories\TimerRepository;
use App\Containers\Timer\Models\Timer;
use App\Containers\Timer\Models\TimerState;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Exception;

class PauseTimerTask extends Task
{

    protected $repository;

    public function __construct(TimerRepository $repository)
    {
        $this->repository = $repository;
    }

  public function run(array $data)
  {
    try {
      $t = [];
      $data['state_id'] = TimerState::Start;
      // $data['date_start'] = Carbon::now();

      $runningTimers = Timer::where([['state_id', '=', TimerState::Start], ['task_id', '=', $data['task_id']]])->get();

      if($runningTimers->count()>0) {
        foreach ($runningTimers as $t) {
          $dateStart = new Carbon($t->date_start);
          $t->date_end = Carbon::now();

          $total_time = $dateStart->diffInSeconds($t->date_end);
          $t->state_id = TimerState::OnHold;
          $t->total_time = $total_time;
          $t->update();
        }
      }

      return $t;
    }
    catch (Exception $exception) {
      throw new CreateResourceFailedException();
    }
  }
}
