<?php

namespace App\Containers\Expense\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteExpenseAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Expense@DeleteExpenseTask', [$request->id]);
    }
}
