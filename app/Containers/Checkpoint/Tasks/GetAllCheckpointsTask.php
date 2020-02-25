<?php

namespace App\Containers\Checkpoint\Tasks;

use App\Containers\Checkpoint\Data\Repositories\CheckpointRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllCheckpointsTask extends Task
{

    protected $repository;

    public function __construct(CheckpointRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
