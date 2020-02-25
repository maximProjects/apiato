<?php

namespace App\Containers\Balance\Tasks;

use App\Containers\Balance\Data\Repositories\BalanceRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllBalancesTask extends Task
{

    protected $repository;

    public function __construct(BalanceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
