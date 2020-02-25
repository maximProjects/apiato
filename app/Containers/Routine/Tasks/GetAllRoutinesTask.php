<?php

namespace App\Containers\Routine\Tasks;

use App\Containers\Routine\Data\Repositories\RoutineRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllRoutinesTask extends Task
{

    protected $repository;

    public function __construct(RoutineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
