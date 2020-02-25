<?php

namespace App\Containers\Expense\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllExpensesAction extends Action
{
    public function run(Request $request)
    {
        $expenses = Apiato::call('Expense@GetAllExpensesTask', [], ['addRequestCriteria']);

        return $expenses;
    }
}
