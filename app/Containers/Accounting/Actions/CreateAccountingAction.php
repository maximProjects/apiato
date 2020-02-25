<?php

namespace App\Containers\Accounting\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAccountingAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $accounting = Apiato::call('Accounting@CreateAccountingTask', [$data]);

        return $accounting;
    }
}
