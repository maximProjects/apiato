<?php

namespace App\Containers\Expense\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetExpensesByProjectIdAction extends Action
{
    public function run(Request $request)
    {
        $expense = Apiato::call('Expense@GetExpensesByProjectIdTask', [$request->id]);

        return $expense;
    }
}
