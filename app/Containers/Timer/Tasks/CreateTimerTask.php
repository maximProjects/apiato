<?php

namespace App\Containers\Timer\Tasks;

use App\Containers\Timer\Data\Repositories\TimerRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateTimerTask extends Task
{

    protected $repository;

    public function __construct(TimerRepository $repository)
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
