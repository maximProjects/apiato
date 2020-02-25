<?php

namespace App\Containers\Balance\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateMonthlyBalanceAction extends Action
{
    public function run(array $data)
    {

        $monthlybalance = Apiato::call('Balance@CreateMonthlyBalanceTask', [$data]);

        return $monthlybalance;
    }
}
