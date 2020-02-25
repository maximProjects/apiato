<?php

namespace App\Containers\Expense\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateExpenseCommentAction extends Action
{
    public function run(int $id, array $data)
    {
        $comments = Apiato::call('Expense@CreateExpenseCommentTask', [$id, $data]);

        return $comments;
    }
}
