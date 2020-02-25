<?php

namespace App\Containers\TimeRegistry\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\TimeRegistry\Data\Repositories\TimeRegistryRepository;
use App\Containers\TimeRegistry\Models\TaskRegistryType;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Containers\TimeRegistry\Models\TimeRegistryState;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Auth;

class CreateTimeRegistryTask extends Task
{

    protected $repository;

    public function __construct(TimeRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {

        try {
            $timeRegistry = null;
            $role_id = Auth::user()->roles()->first()->id;

            if( ($role_id == 1 || $role_id == 2) && isset($data['user_id']))
            {
                $u = User::find($data['user_id']);
                $role_id = $u->roles()->first()->id;
            }

            $data['type_id'] = $role_id;


            if(isset($data['state_id']) && $data['state_id'] == 0) {
                $user = Auth::user();
                $timeRegistry = TimeRegistry::where([['state_id', '=', TimeRegistryState::Draft], ['created_by', '=', $user->id]])->first();
                if($timeRegistry) {

                    $timeRegistry->update($data);
                }

                if(!$timeRegistry) {

                    $timeRegistry = $this->repository->create($data);
                }

            } else {

                $timeRegistry = $this->repository->create($data);
            }

            if(isset($data['jobs'])){
                $jobsArr = [
                  'id' => $timeRegistry->id,
                  'jobs' => $data['jobs']
                ];

                Apiato::call('TimeRegistry@TimeRegistryIdSubmitTask', [$jobsArr]);
            }
            return $timeRegistry;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
