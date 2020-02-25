<?php

namespace App\Containers\Balance\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllMonthlyBalanceAction extends Action
{
    public function run(Request $request)
    {
        $monthlybalance = Apiato::call('Balance@FindAllMonthlyBalanceTask', [], ['addRequestCriteria']);

        return $monthlybalance;
    }
}
