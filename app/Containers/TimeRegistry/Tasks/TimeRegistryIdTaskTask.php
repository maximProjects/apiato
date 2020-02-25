<?php

namespace App\Containers\TimeRegistry\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\TimeRegistry\Data\Repositories\TimeRegistryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class TimeRegistryIdTaskTask extends Task
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
          $task = \App\Containers\Task\Models\Task::find($data['task_id']);
          $taskJobTypes = $task->jobTypes()->get();

          foreach ($taskJobTypes as $jobType)
          {
            $jobData = [
              "job_type_id" => $jobType->id,
              "time_registry_id" => $timeRegistry->id,
              "project_id" => $timeRegistry->project_id,
              "project_group_id" => $timeRegistry->project_group_id,
              "task_id" => $task->id,
              "date_start" => $data['date_start']
            ];
            $job = Apiato::call('Job@CreateJobTask', [$jobData]);

          }

          return $timeRegistry;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
