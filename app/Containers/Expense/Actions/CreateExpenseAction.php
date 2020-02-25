<?php

namespace App\Containers\Expense\Actions;

use App\Containers\Expense\Data\Transporters\ExpenseTransporter;
use App\Containers\Expense\Models\Expense;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateExpenseAction extends Action
{
    public function run(array $data)
    {
        $expense = Apiato::call('Expense@CreateExpenseTask', [$data]);

        return $expense;



    }




}
