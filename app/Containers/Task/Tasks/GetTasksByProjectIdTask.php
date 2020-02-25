<?php

namespace App\Containers\Task\Tasks;

use App\Containers\Task\Data\Repositories\TaskRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetTasksByProjectIdTask extends Task
{

    protected $repository;

    public function __construct(TaskRepository $repository)
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
