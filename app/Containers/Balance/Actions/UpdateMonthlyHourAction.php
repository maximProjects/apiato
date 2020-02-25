<?php

namespace App\Containers\Balance\Actions;

use App\Containers\Balance\Data\Transporters\MonthlyHourTransporter;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateMonthlyHourAction extends Action
{
    public function run(MonthlyHourTransporter $data)
    {

        $monthlyhour = Apiato::call('Balance@UpdateMonthlyHourTask', [$data->id, $data->toArray()]);

        return $monthlyhour;
    }
}
