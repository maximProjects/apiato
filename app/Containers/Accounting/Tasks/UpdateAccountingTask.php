<?php

namespace App\Containers\Accounting\Tasks;

use App\Containers\Accounting\Data\Repositories\AccountingRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccountingTask extends Task
{

    protected $repository;

    public function __construct(AccountingRepository $repository)
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
