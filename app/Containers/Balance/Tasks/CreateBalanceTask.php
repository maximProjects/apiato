<?php

namespace App\Containers\Balance\Tasks;

use App\Containers\Balance\Data\Repositories\BalanceRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateBalanceTask extends Task
{

    protected $repository;

    public function __construct(BalanceRepository $repository)
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
