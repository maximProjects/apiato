<?php

namespace App\Containers\Statistic\Tasks;

use App\Containers\Statistic\Data\Repositories\StatisticRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteStatisticTask extends Task
{

    protected $repository;

    public function __construct(StatisticRepository $repository)
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
