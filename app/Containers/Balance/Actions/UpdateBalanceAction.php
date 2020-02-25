<?php

namespace App\Containers\Balance\Actions;

use App\Containers\Balance\Data\Transporters\BalanceTransporter;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateBalanceAction extends Action
{
    public function run(BalanceTransporter $data)
    {
        $balance = Apiato::call('Balance@UpdateBalanceTask', [$data->id, $data->toArray()]);

        return $balance;
    }
}
