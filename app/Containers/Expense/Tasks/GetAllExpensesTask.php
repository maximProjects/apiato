<?php

namespace App\Containers\Expense\Tasks;

use App\Containers\Expense\Data\Repositories\ExpenseRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllExpensesTask extends Task
{

    protected $repository;

    public function __construct(ExpenseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
