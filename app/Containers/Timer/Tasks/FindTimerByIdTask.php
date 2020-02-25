<?php

namespace App\Containers\Timer\Tasks;

use App\Containers\Timer\Data\Repositories\TimerRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindTimerByIdTask extends Task
{

    protected $repository;

    public function __construct(TimerRepository $repository)
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
