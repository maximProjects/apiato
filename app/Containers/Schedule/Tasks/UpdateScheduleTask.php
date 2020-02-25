<?php

namespace App\Containers\Schedule\Tasks;

use App\Containers\Schedule\Data\Repositories\ScheduleRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateScheduleTask extends Task
{

    protected $repository;

    public function __construct(ScheduleRepository $repository)
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
