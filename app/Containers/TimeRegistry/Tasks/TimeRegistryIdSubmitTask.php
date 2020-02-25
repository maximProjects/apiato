<?php

namespace App\Containers\TimeRegistry\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Job\Models\JobType;
use App\Containers\TimeRegistry\Data\Repositories\TimeRegistryRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class TimeRegistryIdSubmitTask extends Task
{

    protected $repository;

    public function __construct(TimeRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {

        try {
          $timeRegistry = $this->repository->find($data['id']);

          if(isset($data['jobs'])){

            foreach($data['jobs'] as $jobData) {
              $jobData['is_template'] = 1;
              $jobData['time_registry_id'] = $timeRegistry->id;

                if(isset($jobData["id"]) && !empty($jobData["id"]))
                {
                    $job = Apiato::call('Job@UpdateJobTask', [$jobData["id"], $jobData]);
                } else {

                    if($timeRegistry->user) {
                        $jobData["hourly_rate"] = $timeRegistry->user->hourly_rate;

                    }

                    if(isset($jobData["job_type_id"])) {
                        $jt = JobType::find($jobData["job_type_id"]);
                        $jobData["name"] = $jt->name;
                    }
                    $job = Apiato::call('Job@CreateJobTask', [$jobData]);

                }

            }
          }

            return $timeRegistry;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
