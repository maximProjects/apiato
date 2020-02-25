<?php

namespace App\Containers\Accounting\Tasks;

use App\Containers\Accounting\Data\Repositories\AccountingRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccountingTask extends Task
{

    protected $repository;

    public function __construct(AccountingRepository $repository)
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
