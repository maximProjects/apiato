<?php

namespace App\Containers\Balance\Tasks;

use App\Containers\Balance\Data\Repositories\BalanceRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindBalanceByIdTask extends Task
{

    protected $repository;

    public function __construct(BalanceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
