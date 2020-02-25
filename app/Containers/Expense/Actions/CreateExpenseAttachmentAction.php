<?php

namespace App\Containers\Expense\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateExpenseAttachmentAction extends Action
{
    public function run($id, array $files = [])
    {
        $expense = Apiato::call('Expense@FindExpenseByIdTask', [$id]);

        $media = Apiato::call('Expense@CreateExpenseAttachmentTask', [$expense->id, $files]);

        return $media;
    }
}
