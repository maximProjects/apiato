<?php

namespace App\Containers\Balance\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindBalanceByIdAction extends Action
{
    public function run(Request $request)
    {
        $balance = Apiato::call('Balance@FindBalanceByIdTask', [$request->id]);

        return $balance;
    }
}
