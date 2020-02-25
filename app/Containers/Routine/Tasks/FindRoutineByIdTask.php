<?php

namespace App\Containers\Routine\Tasks;

use App\Containers\Routine\Data\Repositories\RoutineRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindRoutineByIdTask extends Task
{

    protected $repository;

    public function __construct(RoutineRepository $repository)
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
