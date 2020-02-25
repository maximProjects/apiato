<?php

namespace App\Containers\Statistic\Tasks;

use App\Containers\Statistic\Data\Repositories\StatisticRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateStatisticTask extends Task
{

    protected $repository;

    public function __construct(StatisticRepository $repository)
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
