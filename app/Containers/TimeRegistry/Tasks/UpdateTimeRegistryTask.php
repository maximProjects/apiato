<?php

namespace App\Containers\TimeRegistry\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\TimeRegistry\Data\Repositories\TimeRegistryRepository;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Containers\TimeRegistry\Models\TimeRegistryState;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateTimeRegistryTask extends Task
{

    protected $repository;

    public function __construct(TimeRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            $timeRegistry = TimeRegistry::find($id);

            if(!isset($data['state_id'])) {


                if($timeRegistry) {
                    if($timeRegistry->state_id == 0) {

                        $data['state_id'] = TimeRegistryState::New;
                    }
                }
            }

            if(isset($data['time_registry_submit'])) {
              Apiato::call('TimeRegistry@FinishTimeRegistryTask', [$data]);
              $data['state_id'] = TimeRegistryState::Finished;
            }

            if( $timeRegistry->jobs()->count() > 0) {
                foreach ($timeRegistry->jobs()->get() as $jb) {
                    if(isset($data['jobs'])){
                        $del = true;
                        foreach ($data['jobs'] as $j) {
                            if(isset($j['id'])) {
                                if($j['id'] == $jb->id) {
                                    $del = false;
                                }
                            }
                        }
                    }
                    if($del == true) {
                        $jb->delete();
                    }
                }
            }


            if(isset($data['jobs'])){
                $jobsArr = [
                    'id' => $timeRegistry->id,
                    'jobs' => $data['jobs']
                ];
                Apiato::call('TimeRegistry@TimeRegistryIdSubmitTask', [$jobsArr]);
            }

            $this->repository->update($data, $id);

            return $timeRegistry;
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
