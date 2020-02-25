<?php

namespace App\Containers\Timer\Tasks;

use App\Containers\Timer\Data\Repositories\TimerRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateTimerTask extends Task
{

    protected $repository;

    public function __construct(TimerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
