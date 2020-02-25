<?php

namespace App\Containers\Checkpoint\Tasks;

use App\Containers\Checkpoint\Data\Repositories\CheckpointRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class SeedCheckpointTask extends Task
{

    protected $repository;

    public function __construct(CheckpointRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
