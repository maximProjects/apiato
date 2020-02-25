<?php

namespace App\Containers\Task\Tasks;

use App\Containers\Task\Data\Repositories\TaskRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindTaskByProjectId extends Task
{

    protected $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($projectId)
    {
        try {
            return $this->repository->where($projectId);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
