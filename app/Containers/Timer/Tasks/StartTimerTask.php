<?php

namespace App\Containers\Timer\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Project\Models\Project;
use App\Containers\Task\Models\TaskState;
use App\Containers\Timer\Data\Repositories\TimerRepository;
use App\Containers\Timer\Models\Timer;
use App\Containers\Timer\Models\TimerState;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Containers\TimeRegistry\Models\TimeRegistryState;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class StartTimerTask extends Task
{

    protected $repository;

    public function __construct(TimerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {

          $user = Auth::user();
          $tm = TimeRegistry::whereIn('state_id',  [TimeRegistryState::Active, TimeRegistryState::OnHold,TimeRegistryState::Offline])->where('user_id', $user->id)->first();

//          if($data["project_id"])
//          {
//              $project = Project::find($data["project_id"]);
//              $address = $project->addresses()->first();
//              $latFrom = $address->location_lat;
//              $lngFrom = $address->location_lng;
//              $latTo = $data['position']['coords']['latitude'];
//              $lngTo = $data['position']['coords']['longitude'];
//          }

          $data['time_registry_id'] = $tm->id;
            $timersQ = [['state_id', '<>', TimerState::Stop]];
            if(isset($data['task_id'])) {
              $timersQ[] =    ['task_id', '=', $data['task_id']];
              $task = Apiato::call('Task@UpdateTaskTask', [$data['task_id'], ['state_id' => TaskState::Processing]]);
              $tm->tasks()->sync($data['task_id'], false);

            }
            $data['state_id'] = TimerState::Start;
            $data['date_start'] = Carbon::now();


            $runningTimers = Timer::where($timersQ)->get();

            if($runningTimers->count()>0) {
                foreach ($runningTimers as $t) {
                    $dateStart = new Carbon($t->date_start);
                    $dateStop = $t->date_end;
                    if($t->state_id == TimerState::Start) {
                        $dateStop = new Carbon($t->date_end);
                        $t->date_end = $dateStop;
                    }

                    $total_time = $dateStart->diffInSeconds($dateStop);

                    $t->state_id = TimerState::Stop;
                    $t->total_time = $total_time;
                    $t->update();
                }
            }

            $timer = $this->repository->create($data);

            return $timer;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
