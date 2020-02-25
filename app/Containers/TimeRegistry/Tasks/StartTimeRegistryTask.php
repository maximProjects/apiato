<?php

namespace App\Containers\TimeRegistry\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Project\Models\Project;
use App\Containers\TimeRegistry\Data\Repositories\TimeRegistryRepository;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Containers\TimeRegistry\Models\TimeRegistryState;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Auth;
use Exception;
use Carbon\Carbon;
class StartTimeRegistryTask extends Task
{

    protected $repository;

    public function __construct(TimeRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            //dump($data);
            //die('task');

//            if($data["project_id"])
//            {
//                if(!isset($data['position']['coords']['latitude']) || !isset($data['position']['coords']['longitude']) ) {
//                    return ['error' => 'bad coords'];
//                }
//                $project = Project::find($data["project_id"]);
//                $address = $project->addresses()->first();
//                $latFrom = $address->location_lat;
//                $lngFrom = $address->location_lng;
//                $latTo = $data['position']['coords']['latitude'];
//                $lngTo = $data['position']['coords']['longitude'];
//                $distance = CalculateDistance($latFrom, $lngFrom, $latTo, $lngTo);
//                if($distance > 1000) {
//                    return ['error' => 'distance'];
//                }
//            }

            $timeRegistry = null;
            $user = Auth::user();
            $role_id = $user->roles()->first()->id;

            if( ($role_id == 1 || $role_id == 2) && isset($data['user_id']))
            {
                $u = User::find($data['user_id']);
                $role_id = $u->roles()->first()->id;
            }
            $data['user_id'] = $user->id;
            $data['type_id'] = $role_id;
            $data['date_start'] = Carbon::now();
            $data['state_id'] = TimeRegistryState::Active;
            $timeRegistry = TimeRegistry::whereIn('state_id',  [TimeRegistryState::Active, TimeRegistryState::OnHold,TimeRegistryState::Offline])->where('user_id', $user->id)->first();

            if(!$timeRegistry) {

                $timeRegistry = $this->repository->create($data);

                if(isset($data['task_id']) && !empty($data['task_id']))
                {

                    $task = \App\Containers\Task\Models\Task::find($data['task_id']);

                    $jobTypes = $task->jobTypes()->get()->toArray();

                    $jobs = [];

                    if(count($jobTypes)>0) {
                        foreach($jobTypes as $key => $jT) {
                            $jobs[$key] = [
                                'task_id' => $data['task_id'],
                                'job_type_id' => $jT['id'],
                                'name' => $jT['name'],
                                'description' => $jT['description'],
                                'date_start' => $data['date_start']
                            ];

                            if(isset($data['project_id'])) {
                                $jobs[$key]['project_id'] = $data['project_id'];
                            }
                        }

                        $jobsArr = [
                            'id' => $timeRegistry->id,
                            'jobs' => $jobs
                        ];
                        Apiato::call('TimeRegistry@TimeRegistryIdSubmitTask', [$jobsArr]);
                     }


                }
            }

            if($timeRegistry) {
                $timeRegistry->update(['state_id' => TimeRegistryState::Active]);
            }


          Apiato::call('Timer@StartTimerTask', [$data]);



            return $timeRegistry;

           // return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
