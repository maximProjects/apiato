<?php

namespace App\Containers\Balance\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllBalancesAction extends Action
{
    public function run(Request $request)
    {
        $balances = Apiato::call('Balance@GetAllBalancesTask', [], ['addRequestCriteria']);

        return $balances;
    }
}
