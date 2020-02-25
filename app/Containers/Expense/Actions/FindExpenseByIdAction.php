<?php

namespace App\Containers\Expense\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindExpenseByIdAction extends Action
{
    public function run(Request $request)
    {
        $expense = Apiato::call('Expense@FindExpenseByIdTask', [$request->id]);

        return $expense;
    }
}
