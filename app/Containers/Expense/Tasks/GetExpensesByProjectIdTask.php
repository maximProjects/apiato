<?php

namespace App\Containers\Expense\Tasks;

use App\Containers\Expense\Data\Repositories\ExpenseRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetExpensesByProjectIdTask extends Task
{

    protected $repository;

    public function __construct(ExpenseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($project_id)
    {
        try {
            return $this->repository->findByField('project_id', $project_id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
