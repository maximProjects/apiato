<?php

namespace App\Containers\Balance\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateMonthlyHoursAction extends Action
{
    public function run(array $data)
    {
        $monthlyhours = Apiato::call('Balance@CreateMonthlyHoursTask', [$data]);

        return $monthlyhours;
    }
}
