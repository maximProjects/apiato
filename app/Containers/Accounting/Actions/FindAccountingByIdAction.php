<?php

namespace App\Containers\Accounting\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAccountingByIdAction extends Action
{
    public function run(Request $request)
    {
        $accounting = Apiato::call('Accounting@FindAccountingByIdTask', [$request->id]);

        return $accounting;
    }
}
