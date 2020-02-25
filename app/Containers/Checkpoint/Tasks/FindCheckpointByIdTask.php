<?php

namespace App\Containers\Checkpoint\Tasks;

use App\Containers\Checkpoint\Data\Repositories\CheckpointRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindCheckpointByIdTask extends Task
{

    protected $repository;

    public function __construct(CheckpointRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
