<?php

namespace App\Containers\Expense\Actions;

use App\Containers\Expense\Data\Transporters\ExpenseTransporter;
use App\Containers\Expense\Models\Expense;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class UpdateExpenseAction extends Action
{
    public function run(ExpenseTransporter $data): Expense
    {

        $expense = Apiato::call('Expense@UpdateExpenseTask', [$data->id, $data->toArray()]);

        return $expense;
    }
}
