<?php

namespace App\Containers\Expense\Actions;

use App\Containers\Expense\UI\API\Requests\FindExpenseByIdRequest;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetExpenseAttachmentsAction extends Action
{
    public function run(FindExpenseByIdRequest $request)
    {
        $media = Apiato::call('Expense@GetExpenseAttachmentsTask', [$request->id]);

        return $media;
    }
}
