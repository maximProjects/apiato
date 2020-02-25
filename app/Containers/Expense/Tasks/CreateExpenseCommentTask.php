<?php

namespace App\Containers\Expense\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Expense\Data\Repositories\ExpenseRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateExpenseCommentTask extends Task
{

    protected $repository;

    public function __construct(ExpenseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, $comments)
    {
        try {
            $expense = $this->repository->find($id);
            foreach($comments as $c) {
                if(isset($c['content'])) {
                    $comment = Apiato::call('Comment@CreateCommentTask', [$c]);
                    $commentArray[] = $comment;
                    $expense->comments()->attach($comment->id);
                }
            }
            return $commentArray;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
