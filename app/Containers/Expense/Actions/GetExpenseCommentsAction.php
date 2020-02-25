<?php

namespace App\Containers\Expense\Actions;

use App\Containers\Expense\UI\API\Requests\FindExpenseByIdRequest;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetExpenseCommentsAction extends Action
{
    public function run(FindExpenseByIdRequest $request)
    {
        $comments = Apiato::call('Expense@GetExpenseCommentsTask', [$request->id]);

        return $comments;
    }
}
