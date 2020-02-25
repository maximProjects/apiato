<?php

namespace App\Containers\Balance\Tasks;

use App\Containers\Balance\Data\Repositories\MonthlyBalanceRepository;
use App\Ship\Parents\Tasks\Task;

class FindAllMonthlyBalanceTask extends Task
{

    protected $repository;

    public function __construct(MonthlyBalanceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
