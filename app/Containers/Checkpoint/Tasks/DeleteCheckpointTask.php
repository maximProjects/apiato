<?php

namespace App\Containers\Checkpoint\Tasks;

use App\Containers\Checkpoint\Data\Repositories\CheckpointRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteCheckpointTask extends Task
{

    protected $repository;

    public function __construct(CheckpointRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
