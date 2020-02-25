<?php

namespace App\Containers\Statistic\Tasks;

use App\Containers\Statistic\Data\Repositories\StatisticRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateStatisticTask extends Task
{

    protected $repository;

    public function __construct(StatisticRepository $repository)
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
