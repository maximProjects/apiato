<?php

namespace App\Containers\Balance\Actions;

use App\Containers\Balance\Data\Transporters\MonthlyBalanceTransporter;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateMonthlyBalanceAction extends Action
{
    public function run(MonthlyBalanceTransporter $data)
    {

        $monthlybalance = Apiato::call('Balance@UpdateMonthlyBalanceTask', [$data->id, $data->toArray()]);

        return $monthlybalance;
    }
}
