<?php

namespace App\Containers\Timer\Tasks;

use App\Containers\Timer\Data\Repositories\TimerRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteTimerTask extends Task
{

    protected $repository;

    public function __construct(TimerRepository $repository)
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
