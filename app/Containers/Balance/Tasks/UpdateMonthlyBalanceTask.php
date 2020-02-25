<?php

namespace App\Containers\Balance\Tasks;

use App\Containers\Balance\Data\Repositories\MonthlyBalanceRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateMonthlyBalanceTask extends Task
{

    protected $repository;

    public function __construct(MonthlyBalanceRepository $repository)
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
