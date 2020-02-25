<?php

namespace App\Containers\Job\Tasks;

use App\Containers\Job\Data\Repositories\JobTypeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetJobTypesByProjectIdTask extends Task
{

    protected $repository;

    public function __construct(JobTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($project_id)
    {
        try {
            return $this->repository->findByField('project_id', $project_id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
