<?php

namespace App\Containers\Expense\Tasks;

use App\Containers\Expense\Data\Repositories\ExpenseRepository;
use App\Containers\Project\Models\ExpenseState;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateExpenseTask extends Task
{

    protected $repository;

    public function __construct(ExpenseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $expense = null;

            if(isset($data['state_id']) && $data['state_id'] == 0) {
                $user = Auth::user();
                $expense = ExpenseState::where([['state_id', '=', ExpenseState::Draft], ['created_by', '=', $user->id]])->first();
                if($expense) {
                    $expense->update($data);
                }
                $is_template = 1;
                if(!$expense) {
                    $expense = $this->repository->create($data);
                }
            } else {
                //die('create normal');
                $expense = $this->repository->create($data);

            }
            return $expense;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
