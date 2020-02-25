<?php

namespace App\Containers\Expense\Tasks;

use App\Containers\Expense\Data\Repositories\ExpenseRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetExpenseCommentsTask extends Task
{

    protected $repository;

    public function __construct(ExpenseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id)->comments()->get();
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
