<?php

namespace App\Containers\Accounting\Tasks;

use App\Containers\Accounting\Data\Repositories\AccountingRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccountingByIdTask extends Task
{

    protected $repository;

    public function __construct(AccountingRepository $repository)
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
