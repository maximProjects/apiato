<?php

namespace App\Containers\Accounting\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAccountingAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Accounting@DeleteAccountingTask', [$request->id]);
    }
}
